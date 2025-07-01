<?php
require_once '../config.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['email']) || !isset($input['password'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Email and password required']);
    exit;
}

$email = $input['email'];
$password = $input['password'];
$name = $input['name'] ?? 'Test User';

try {
    $auth = new UserAuth();
    
    // Try to validate existing user first
    $userId = $auth->validateUser($email, $password);
    
    if (!$userId) {
        // Create new user if validation fails
        $userId = $auth->createUser($email, $name, $password);
    }
    
    // Create session token
    $sessionToken = $auth->createSession($userId);
    
    echo json_encode([
        'success' => true,
        'session_token' => $sessionToken,
        'user' => [
            'email' => $email,
            'name' => $name
        ]
    ]);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Login failed: ' . $e->getMessage()]);
}
?>

