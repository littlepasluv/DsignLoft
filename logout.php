<?php
// Start the session if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Respond with a success message
echo json_encode(['success' => true, 'message' => 'Logged out successfully']);
?>

