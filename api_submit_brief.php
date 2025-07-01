<?php
require_once 'config.php';

setCORSHeaders();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(['error' => 'Method not allowed'], 405);
}

try {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!$input) {
        // Handle form data
        $input = $_POST;
        
        // Handle file upload if present
        if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $filename = basename($_FILES['uploaded_file']['name']);
            $targetFile = $uploadDir . time() . '_' . $filename;
            
            if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $targetFile)) {
                $input['uploaded_file'] = $targetFile;
            }
        }
    }
    
    // Validate required fields
    $requiredFields = ['user_email', 'brand_name', 'industry'];
    foreach ($requiredFields as $field) {
        if (empty($input[$field])) {
            jsonResponse(['error' => "Field '$field' is required"], 400);
        }
    }
    
    $userEmail = sanitizeInput($input['user_email']);
    if (!validateEmail($userEmail)) {
        jsonResponse(['error' => 'Invalid email address'], 400);
    }
    
    // Get user ID from email
    $db = DatabaseConfig::getConnection();
    $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$userEmail]);
    $user = $stmt->fetch();
    
    if (!$user) {
        jsonResponse(['error' => 'User not found'], 404);
    }
    
    // Prepare brief data
    $briefData = [
        'user_email' => $userEmail,
        'brand_name' => sanitizeInput($input['brand_name']),
        'industry' => sanitizeInput($input['industry']),
        'slogan' => sanitizeInput($input['slogan'] ?? ''),
        'description' => sanitizeInput($input['description'] ?? ''),
        'logos' => isset($input['logos']) ? (is_array($input['logos']) ? $input['logos'] : explode(',', $input['logos'])) : [],
        'style' => isset($input['style']) ? (is_array($input['style']) ? $input['style'] : json_decode($input['style'], true)) : [],
        'colors' => isset($input['colors']) ? (is_array($input['colors']) ? $input['colors'] : explode(',', $input['colors'])) : [],
        'own_color' => sanitizeInput($input['own_color'] ?? ''),
        'uploaded_file' => $input['uploaded_file'] ?? '',
        'package_type' => sanitizeInput($input['package_type'] ?? ''),
        'package_options' => isset($input['package_options']) ? (is_array($input['package_options']) ? $input['package_options'] : json_decode($input['package_options'], true)) : [],
        'total_price' => floatval($input['total_price'] ?? 0)
    ];
    
    $briefManager = new BriefManager();
    $briefId = $briefManager->submitBrief($user['id'], $briefData);
    
    jsonResponse([
        'success' => true,
        'message' => 'Brief submitted successfully',
        'brief_id' => $briefId
    ]);
    
} catch (Exception $e) {
    jsonResponse(['error' => $e->getMessage()], 500);
}
?>

