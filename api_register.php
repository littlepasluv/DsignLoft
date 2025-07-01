<?php
require_once 'config.php';

setCORSHeaders();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(['error' => 'Method not allowed'], 405);
}

try {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!$input) {
        $input = $_POST;
    }
    
    $email = sanitizeInput($input['email'] ?? '');
    $password = $input['password'] ?? '';
    $fullName = sanitizeInput($input['full_name'] ?? '');
    $userType = sanitizeInput($input['user_type'] ?? 'client');
    
    if (!validateEmail($email)) {
        jsonResponse(['error' => 'Invalid email address'], 400);
    }
    
    if (strlen($password) < 6) {
        jsonResponse(['error' => 'Password must be at least 6 characters'], 400);
    }
    
    $auth = new UserAuth();
    $userId = $auth->register($email, $password, $fullName, $userType);
    
    // Auto-login after registration
    $loginData = $auth->login($email, $password);
    
    jsonResponse([
        'success' => true,
        'message' => 'Account created successfully',
        'user' => $loginData
    ]);
    
} catch (Exception $e) {
    jsonResponse(['error' => $e->getMessage()], 400);
}
?>

