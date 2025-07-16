<?php
// api/save_brief.php - Final Version
require_once '../config.php';

$db = Database::getInstance()->conn;
$data = json_decode(file_get_contents("php://input"));

// The Brief ID is the firebase_uid. We must have it to proceed.
if (empty($data->firebase_uid) || empty($data->brief)) {
    http_response_code(400);
    exit(json_encode(['status' => 'error', 'message' => 'Error: Brief ID not found. Cannot save changes.']));
}

$uid = $data->firebase_uid;
$brief_data_json = json_encode($data->brief);

// MySQL compatible SQL command to UPDATE the brief if the user ID
// already exists in the table, or INSERT a new one if it doesn't.
$sql = "INSERT INTO creative_briefs (firebase_uid, brief_data) VALUES (:uid, :data)
        ON DUPLICATE KEY UPDATE brief_data = :data";

try {
    $stmt = $db->prepare($sql);
    $stmt->execute([
        'uid'  => $uid,
        'data' => $brief_data_json
    ]);
    echo json_encode(['status' => 'success']);
} catch (PDOException $e) {
    http_response_code(500);
    exit(json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]));
}
?>


