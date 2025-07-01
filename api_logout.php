<?php
require_once 'config.php';

setCORSHeaders();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(['error' => 'Method not allowed'], 405);
}

try {
    // Get session token from headers or POST data
    $sessionToken = $_POST['session_token'] ?? $_SERVER['HTTP_AUTHORIZATION'] ?? '';
    
    if (empty($sessionToken)) {
        jsonResponse(['error' => 'Session token required'], 400);
    }
    
    // Remove 'Bearer ' prefix if present
    $sessionToken = str_replace('Bearer ', '', $sessionToken);
    
    // Logout user by invalidating session
    $auth = new UserAuth();
    $auth->logout($sessionToken);
    
    // Clear any PHP session if exists
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION = array();
    session_destroy();
    
    jsonResponse([
        'success' => true,
        'message' => 'Logged out successfully'
    ]);
    
} catch (Exception $e) {
    jsonResponse(['error' => $e->getMessage()], 500);
}
?>

