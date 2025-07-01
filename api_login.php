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
    
    if (!validateEmail($email)) {
        jsonResponse(['error' => 'Invalid email address'], 400);
    }
    
    if (empty($password)) {
        jsonResponse(['error' => 'Password is required'], 400);
    }
    
    $auth = new UserAuth();
    $loginData = $auth->login($email, $password);
    
    jsonResponse([
        'success' => true,
        'message' => 'Login successful',
        'user' => $loginData
    ]);
    
} catch (Exception $e) {
    jsonResponse(['error' => $e->getMessage()], 401);
}
?>

