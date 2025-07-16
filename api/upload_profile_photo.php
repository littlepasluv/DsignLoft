<?php
// api/upload_profile_photo.php - Handle profile photo upload and storage
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}

require_once '../config.php';

try {
    // Check if file was uploaded
    if (!isset($_FILES['photo']) || $_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
        throw new Exception('No file uploaded or upload error occurred');
    }

    // Get user ID from POST data
    if (!isset($_POST['uid']) || empty($_POST['uid'])) {
        throw new Exception('User ID is required');
    }

    $uid = $_POST['uid'];
    $uploadedFile = $_FILES['photo'];

    // Validate file type
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    $fileType = $uploadedFile['type'];
    
    if (!in_array($fileType, $allowedTypes)) {
        throw new Exception('Invalid file type. Only JPEG, PNG, and GIF are allowed.');
    }

    // Validate file size (max 5MB)
    $maxSize = 5 * 1024 * 1024; // 5MB in bytes
    if ($uploadedFile['size'] > $maxSize) {
        throw new Exception('File size too large. Maximum size is 5MB.');
    }

    // Create uploads directory if it doesn't exist
    $uploadDir = '../uploads/profile_photos/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Generate unique filename
    $fileExtension = pathinfo($uploadedFile['name'], PATHINFO_EXTENSION);
    $fileName = $uid . '_' . time() . '.' . $fileExtension;
    $filePath = $uploadDir . $fileName;

    // Move uploaded file
    if (!move_uploaded_file($uploadedFile['tmp_name'], $filePath)) {
        throw new Exception('Failed to save uploaded file');
    }

    // Generate URL for the uploaded file
    $photoUrl = 'uploads/profile_photos/' . $fileName;

    // Update user's profile photo URL in database
    $stmt = $pdo->prepare("UPDATE users SET photo_url = ? WHERE uid = ?");
    $result = $stmt->execute([$photoUrl, $uid]);

    if (!$result) {
        // If database update fails, remove the uploaded file
        unlink($filePath);
        throw new Exception('Failed to update user profile in database');
    }

    // Return success response
    echo json_encode([
        'success' => true,
        'message' => 'Profile photo uploaded successfully',
        'photo_url' => $photoUrl
    ]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>

