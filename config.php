<?php
// Database configuration for local testing
$host = 'localhost';
$dbname = 'dsignloft_test';
$username = 'root';
$password = '';

// Create database connection with error handling
try {
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database if it doesn't exist
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $pdo->exec("USE $dbname");
    
    // Create users table if it doesn't exist
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) UNIQUE NOT NULL,
        name VARCHAR(255) NOT NULL,
        password VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    
    // Create user_sessions table if it doesn't exist
    $pdo->exec("CREATE TABLE IF NOT EXISTS user_sessions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        session_token VARCHAR(255) UNIQUE NOT NULL,
        expires_at TIMESTAMP NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )");
    
    // Create briefs table if it doesn't exist
    $pdo->exec("CREATE TABLE IF NOT EXISTS briefs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        brief_data JSON NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )");
    
} catch(PDOException $e) {
    // Fallback: Use SQLite for local testing if MySQL fails
    try {
        $pdo = new PDO("sqlite:" . __DIR__ . "/dsignloft_test.db");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Create tables for SQLite
        $pdo->exec("CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email TEXT UNIQUE NOT NULL,
            name TEXT NOT NULL,
            password TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");
        
        $pdo->exec("CREATE TABLE IF NOT EXISTS user_sessions (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            session_token TEXT UNIQUE NOT NULL,
            expires_at DATETIME NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )");
        
        $pdo->exec("CREATE TABLE IF NOT EXISTS briefs (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            brief_data TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )");
        
    } catch(PDOException $e2) {
        die("Database connection failed: " . $e2->getMessage());
    }
}

// User authentication class
class UserAuth {
    private $pdo;
    
    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }
    
    public function createUser($email, $name, $password = null) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO users (email, name, password) VALUES (?, ?, ?)");
            $stmt->execute([$email, $name, $password ? password_hash($password, PASSWORD_DEFAULT) : null]);
            return $this->pdo->lastInsertId();
        } catch(PDOException $e) {
            if ($e->getCode() == 23000) { // Duplicate entry
                // User already exists, get their ID
                $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ?");
                $stmt->execute([$email]);
                return $stmt->fetchColumn();
            }
            throw $e;
        }
    }
    
    public function validateUser($email, $password) {
        $stmt = $this->pdo->prepare("SELECT id, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && ($user['password'] === null || password_verify($password, $user['password']))) {
            return $user['id'];
        }
        return false;
    }
    
    public function createSession($userId) {
        $sessionToken = bin2hex(random_bytes(32));
        $expiresAt = date('Y-m-d H:i:s', strtotime('+30 days'));
        
        $stmt = $this->pdo->prepare("INSERT INTO user_sessions (user_id, session_token, expires_at) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $sessionToken, $expiresAt]);
        
        return $sessionToken;
    }
    
    public function validateSession($sessionToken) {
        $stmt = $this->pdo->prepare("
            SELECT u.id, u.email, u.name 
            FROM user_sessions s 
            JOIN users u ON s.user_id = u.id 
            WHERE s.session_token = ? AND s.expires_at > NOW()
        ");
        $stmt->execute([$sessionToken]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function deleteSession($sessionToken) {
        $stmt = $this->pdo->prepare("DELETE FROM user_sessions WHERE session_token = ?");
        $stmt->execute([$sessionToken]);
    }
}
?>

