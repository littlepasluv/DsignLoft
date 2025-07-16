<?php // api/save_user.php
require_once '../config.php';
$db = Database::getInstance()->conn;
$data = json_decode(file_get_contents("php://input"));
if (empty($data->firebase_uid) || empty($data->email)) { http_response_code(400); exit; }
$sql = "INSERT INTO users (firebase_uid, email, full_name) VALUES (:uid, :email, :name) ON DUPLICATE KEY UPDATE full_name = VALUES(full_name)";
try {
    $stmt = $db->prepare($sql);
    $stmt->execute(['uid' => $data->firebase_uid, 'email' => $data->email, 'name' => $data->fullName ?? '']);
    echo json_encode(['status' => 'success']);
} catch (PDOException $e) { http_response_code(500); exit; }
?>