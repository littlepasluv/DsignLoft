<?php
// api/get_brief.php - Get brief data for a user
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") { exit(0); }

require_once '../config.php';

$db = Database::getInstance()->conn;
$uid = isset($_GET["uid"]) ? $_GET["uid"] : '';

if (empty($uid)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Firebase UID is required.']);
    exit();
}

try {
    $stmt = $db->prepare("SELECT brief_data FROM creative_briefs WHERE firebase_uid = :uid");
    $stmt->execute(['uid' => $uid]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $briefData = json_decode($row['brief_data'], true);
        
        http_response_code(200);
        echo json_encode($briefData);
    } else {
        http_response_code(404);
        echo json_encode(['status' => 'error', 'message' => 'Brief not found.']);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}
?>
