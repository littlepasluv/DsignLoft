<?php
require_once __DIR__ . "/../config.php";

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Handle preflight OPTIONS request
if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(200);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["success" => false, "error" => "Method not allowed"]);
    exit();
}

try {
    // Get JSON input
    $input = json_decode(file_get_contents("php://input"), true);
    
    if (!$input) {
        throw new Exception("Invalid JSON input");
    }
    
    $email = trim($input["email"] ?? "");
    $fullName = trim($input["full_name"] ?? "");
    $userType = trim($input["user_type"] ?? "client");
    
    // Validate input
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Valid email is required");
    }
    
    if (empty($fullName)) {
        throw new Exception("Full name is required");
    }
    
    if (!in_array($userType, ["client", "designer"])) {
        $userType = "client";
    }
    
    $auth = new UserAuth();
    $userId = $auth->updateGoogleUser($email, $fullName, $userType);
    
    // Create session token for the user
    $sessionToken = bin2hex(random_bytes(32));
    $expiresAt = date('Y-m-d H:i:s', strtotime('+30 days'));
    
    $db = DatabaseConfig::getConnection();
    $stmt = $db->prepare("INSERT INTO user_sessions (user_id, session_token, expires_at) VALUES (?, ?, ?)");
    $stmt->execute([$userId, $sessionToken, $expiresAt]);
    
    echo json_encode([
        "success" => true,
        "message" => "User information updated/registered successfully",
        "user" => [
            "id" => $userId,
            "email" => $email,
            "full_name" => $fullName,
            "user_type" => $userType,
            "session_token" => $sessionToken
        ]
    ]);
    
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);
}
?>

