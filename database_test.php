<?php
// Database connection test for Hostinger
require_once 'config.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>DsignLoft Database Connection Test</h2>";

try {
    echo "<p>Testing database connection...</p>";
    $db = DatabaseConfig::getConnection();
    echo "<p style='color: green;'>✅ Database connection successful!</p>";
    
    // Test if tables exist
    $tables = ['users', 'creative_briefs', 'design_services', 'user_sessions'];
    echo "<h3>Checking database tables:</h3>";
    
    foreach ($tables as $table) {
        try {
            $stmt = $db->query("SELECT COUNT(*) FROM $table");
            $count = $stmt->fetchColumn();
            echo "<p style='color: green;'>✅ Table '$table' exists with $count records</p>";
        } catch (Exception $e) {
            echo "<p style='color: red;'>❌ Table '$table' missing or error: " . $e->getMessage() . "</p>";
        }
    }
    
    // Test user authentication classes
    echo "<h3>Testing authentication system:</h3>";
    try {
        $auth = new UserAuth();
        echo "<p style='color: green;'>✅ UserAuth class loaded successfully</p>";
        
        $briefManager = new BriefManager();
        echo "<p style='color: green;'>✅ BriefManager class loaded successfully</p>";
        
        $serviceManager = new ServiceManager();
        echo "<p style='color: green;'>✅ ServiceManager class loaded successfully</p>";
        
    } catch (Exception $e) {
        echo "<p style='color: red;'>❌ Class loading error: " . $e->getMessage() . "</p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Database connection failed: " . $e->getMessage() . "</p>";
    echo "<p>Please check your database credentials in config.php</p>";
}

echo "<h3>PHP Environment:</h3>";
echo "<p>PHP Version: " . phpversion() . "</p>";
echo "<p>PDO Available: " . (extension_loaded('pdo') ? 'Yes' : 'No') . "</p>";
echo "<p>PDO MySQL Available: " . (extension_loaded('pdo_mysql') ? 'Yes' : 'No') . "</p>";
echo "<p>Server Time: " . date('Y-m-d H:i:s') . "</p>";
?>

