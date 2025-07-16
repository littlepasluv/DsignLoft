<?php
// api/get_profile_photo.php - Get user profile photo URL from MySQL
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}

require_once '../config.php';

try {
    // Get user ID from query parameter
    if (!isset($_GET['uid']) || empty($_GET['uid'])) {
        throw new Exception('User ID is required');
    }

    $uid = $_GET['uid'];

    // Get user's profile photo URL from database
    $stmt = $pdo->prepare("SELECT photo_url FROM users WHERE uid = ?");
    $stmt->execute([$uid]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        throw new Exception('User not found');
    }

    // Return the photo URL (or null if not set)
    echo json_encode([
        'success' => true,
        'photo_url' => $user['photo_url']
    ]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>

