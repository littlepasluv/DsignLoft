<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
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
    
    // Get email from query parameters
    $email = trim($_GET['email'] ?? '');
    
    // Validate input
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Valid email is required');
    }
    
    // Get the latest brief for this email
    $stmt = $pdo->prepare("
        SELECT * FROM briefs 
        WHERE email = ? 
        ORDER BY created_at DESC 
        LIMIT 1
    ");
    $stmt->execute([$email]);
    $brief = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($brief) {
        echo json_encode([
            'success' => true,
            'brief' => $brief
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'error' => 'No brief found for this email',
            'brief' => null
        ]);
    }
    
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

