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
    
    // Validate input
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Valid email is required");
    }
    
    $db = DatabaseConfig::getConnection();
    
    // Check if user exists in email_confirmations table
    $stmt = $db->prepare("SELECT confirmed_at FROM email_confirmations WHERE email = ? ORDER BY created_at DESC LIMIT 1");
    $stmt->execute([$email]);
    $confirmation = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Check if user exists in users table
    $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $response = [
        "success" => true,
        "exists" => false,
        "confirmed" => false,
        "in_users_table" => false
    ];
    
    if ($confirmation) {
        $response["exists"] = true;
        $response["confirmed"] = !is_null($confirmation["confirmed_at"]);
    }
    
    if ($user) {
        $response["in_users_table"] = true;
        $response["exists"] = true;
        $response["confirmed"] = true; // If in users table, consider confirmed
    }
    
    echo json_encode($response);
    
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);
}

class DatabaseConfig {
    public static function getConnection() {
        global $pdo;
        return $pdo;
    }
}
?>

