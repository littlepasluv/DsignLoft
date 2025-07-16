<?php
require_once '../config.php';

$db = Database::getInstance()->getConnection();
$firebase_uid = isset($_GET['uid']) ? $_GET['uid'] : '';

if (empty($firebase_uid)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Firebase UID is required.']);
    exit();
}

try {
    $stmt = $db->prepare("SELECT full_name, email, user_type, created_at FROM users WHERE firebase_uid = :firebase_uid");
    $stmt->execute(['firebase_uid' => $firebase_uid]);

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        http_response_code(200);
        echo json_encode(['status' => 'success', 'data' => $user]);
    } else {
        http_response_code(404);
        echo json_encode(['status' => 'error', 'message' => 'User not found in database.']);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}
?>