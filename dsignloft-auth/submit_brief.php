<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed']);
    exit();
}

try {
    // Database configuration
    $host = 'localhost';
    $dbname = 'u919039688_dsignloft_db'; // Replace with your actual database name
    $username = 'u919039688_prio_nugroho';    // Replace with your actual database username
    $password = 'Little20@pasluv';       // Replace with your actual database password
    
    // Create PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Get JSON input
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!$input) {
        throw new Exception('Invalid JSON input');
    }
    
    $email = trim($input['email'] ?? '');
    $companyName = trim($input['company_name'] ?? '');
    $industry = trim($input['industry'] ?? '');
    $servicesNeeded = trim($input['services_needed'] ?? '');
    $budgetRange = trim($input['budget_range'] ?? '');
    $timeline = trim($input['timeline'] ?? '');
    $projectDescription = trim($input['project_description'] ?? '');
    $targetAudience = trim($input['target_audience'] ?? '');
    $designStyle = trim($input['design_style'] ?? '');
    $colorPreferences = trim($input['color_preferences'] ?? '');
    $additionalRequirements = trim($input['additional_requirements'] ?? '');
    
    // Validate input
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Valid email is required');
    }
    
    if (empty($companyName)) {
        throw new Exception('Company name is required');
    }
    
    // Create briefs table if it doesn't exist
    $createTableSQL = "
        CREATE TABLE IF NOT EXISTS briefs (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            company_name VARCHAR(255) NOT NULL,
            industry VARCHAR(255),
            services_needed TEXT,
            budget_range VARCHAR(100),
            timeline VARCHAR(100),
            project_description TEXT,
            target_audience TEXT,
            design_style VARCHAR(255),
            color_preferences TEXT,
            additional_requirements TEXT,
            status ENUM('pending', 'in_progress', 'completed', 'cancelled') DEFAULT 'pending',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            INDEX idx_email (email)
        )
    ";
    $pdo->exec($createTableSQL);
    
    // Check if user already has a brief (update existing or create new)
    $checkStmt = $pdo->prepare("SELECT id FROM briefs WHERE email = ? ORDER BY created_at DESC LIMIT 1");
    $checkStmt->execute([$email]);
    $existingBrief = $checkStmt->fetch();
    
    if ($existingBrief) {
        // Update existing brief
        $updateStmt = $pdo->prepare("
            UPDATE briefs SET
                company_name = ?,
                industry = ?,
                services_needed = ?,
                budget_range = ?,
                timeline = ?,
                project_description = ?,
                target_audience = ?,
                design_style = ?,
                color_preferences = ?,
                additional_requirements = ?,
                updated_at = CURRENT_TIMESTAMP
            WHERE id = ?
        ");
        
        $updateStmt->execute([
            $companyName,
            $industry,
            $servicesNeeded,
            $budgetRange,
            $timeline,
            $projectDescription,
            $targetAudience,
            $designStyle,
            $colorPreferences,
            $additionalRequirements,
            $existingBrief['id']
        ]);
        
        $message = 'Brief updated successfully';
    } else {
        // Insert new brief
        $insertStmt = $pdo->prepare("
            INSERT INTO briefs (
                email, company_name, industry, services_needed, budget_range,
                timeline, project_description, target_audience, design_style,
                color_preferences, additional_requirements
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        
        $insertStmt->execute([
            $email,
            $companyName,
            $industry,
            $servicesNeeded,
            $budgetRange,
            $timeline,
            $projectDescription,
            $targetAudience,
            $designStyle,
            $colorPreferences,
            $additionalRequirements
        ]);
        
        $message = 'Brief submitted successfully';
    }
    
    echo json_encode([
        'success' => true,
        'message' => $message,
        'brief' => [
            'email' => $email,
            'company_name' => $companyName,
            'industry' => $industry,
            'services_needed' => $servicesNeeded,
            'budget_range' => $budgetRange,
            'timeline' => $timeline,
            'project_description' => $projectDescription,
            'target_audience' => $targetAudience,
            'design_style' => $designStyle,
            'color_preferences' => $colorPreferences,
            'additional_requirements' => $additionalRequirements
        ]
    ]);
    
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Database error: ' . $e->getMessage()
    ]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>

