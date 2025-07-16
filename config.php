<?php
// config.php - Final Version
ini_set("display_errors", 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") { exit(0); }

class Database {
    private static $instance = null;
    public $conn;

    // MySQL database credentials
    private $host = "localhost"; // Use 'localhost' for Hostinger internal connections
    private $db_name = "u919039688_dsignloft_db";
    private $username = "u919039688_prio_nugroho";
    private $password = "Little20@pasluv";

    private function __construct() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name}";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Create table if it doesn\\'t exist (MySQL compatible)
            $this->conn->exec("CREATE TABLE IF NOT EXISTS creative_briefs (
                firebase_uid VARCHAR(255) PRIMARY KEY,
                brief_data TEXT
            )");

        } catch(PDOException $e) {
            http_response_code(503);
            die(json_encode(["status" => "error", "message" => "Database Connection Failed: " . $e->getMessage()]));
        }
    }

    public static function getInstance() {
        if (!self::$instance) { self::$instance = new Database(); }
        return self::$instance;
    }
}
?>


