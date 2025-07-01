<?php
require_once __DIR__ . "/../config.php";

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Handle preflight OPTIONS request
if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(200);
    exit();
}

class EmailConfirmation {
    private $db;
    
    public function __construct() {
        global $pdo;
        $this->db = $pdo;
    }
    
    /**
     * Send confirmation email to user
     */
    public function sendConfirmationEmail($email, $fullName) {
        try {
            // Generate confirmation token
            $token = bin2hex(random_bytes(32));
            $expiresAt = date('Y-m-d H:i:s', strtotime('+24 hours'));
            
            // Store token in database
            $stmt = $this->db->prepare("
                INSERT OR REPLACE INTO email_confirmations (email, full_name, token, expires_at, created_at) 
                VALUES (?, ?, ?, ?, datetime('now'))
            ");
            $stmt->execute([$email, $fullName, $token, $expiresAt]);
            
            // Create confirmation link
            $confirmationLink = $this->getBaseUrl() . "/dsignloft-auth/confirm_email.php?token=" . $token;
            
            // Send email
            $emailSent = $this->sendEmail($email, $fullName, $confirmationLink);
            
            return [
                'success' => true,
                'message' => 'Confirmation email sent successfully',
                'token' => $token, // For testing purposes
                'confirmation_link' => $confirmationLink // For testing purposes
            ];
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
    
    /**
     * Verify confirmation token
     */
    public function verifyToken($token) {
        try {
            $stmt = $this->db->prepare("
                SELECT email, full_name, expires_at, confirmed_at 
                FROM email_confirmations 
                WHERE token = ?
            ");
            $stmt->execute([$token]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$result) {
                return [
                    'success' => false,
                    'error' => 'Invalid confirmation token'
                ];
            }
            
            if ($result['confirmed_at']) {
                return [
                    'success' => false,
                    'error' => 'Email already confirmed'
                ];
            }
            
            if (strtotime($result['expires_at']) < time()) {
                return [
                    'success' => false,
                    'error' => 'Confirmation token has expired'
                ];
            }
            
            // Mark as confirmed
            $stmt = $this->db->prepare("
                UPDATE email_confirmations 
                SET confirmed_at = datetime('now') 
                WHERE token = ?
            ");
            $stmt->execute([$token]);
            
            // Create user account
            $userId = $this->createUserAccount($result['email'], $result['full_name']);
            
            // Create session token
            $sessionToken = bin2hex(random_bytes(32));
            $sessionExpiresAt = date('Y-m-d H:i:s', strtotime('+30 days'));
            
            $stmt = $this->db->prepare("
                INSERT INTO user_sessions (user_id, session_token, expires_at) 
                VALUES (?, ?, ?)
            ");
            $stmt->execute([$userId, $sessionToken, $sessionExpiresAt]);
            
            return [
                'success' => true,
                'message' => 'Email confirmed successfully',
                'user' => [
                    'id' => $userId,
                    'email' => $result['email'],
                    'full_name' => $result['full_name']
                ],
                'session_token' => $sessionToken
            ];
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
    
    /**
     * Create user account after email confirmation
     */
    private function createUserAccount($email, $fullName) {
        // First check if user already exists
        $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $existingUser = $stmt->fetchColumn();
        
        if ($existingUser) {
            // Update existing user
            $stmt = $this->db->prepare("
                UPDATE users 
                SET full_name = ?, user_type = 'client', updated_at = datetime('now')
                WHERE email = ?
            ");
            $stmt->execute([$fullName, $email]);
            return $existingUser;
        } else {
            // Create new user
            $stmt = $this->db->prepare("
                INSERT INTO users (email, name, full_name, user_type, created_at) 
                VALUES (?, ?, ?, 'client', datetime('now'))
            ");
            $stmt->execute([$email, $fullName, $fullName]);
            return $this->db->lastInsertId();
        }
    }
    
    /**
     * Send email using PHP mail function (can be replaced with SMTP)
     */
    private function sendEmail($email, $fullName, $confirmationLink) {
        $subject = "Confirm Your DsignLoft Account";
        
        $message = "
        <html>
        <head>
            <title>Confirm Your DsignLoft Account</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: #53AB81; color: white; padding: 20px; text-align: center; }
                .content { padding: 30px; background: #f9f9f9; }
                .button { 
                    display: inline-block; 
                    background: #53AB81; 
                    color: white; 
                    padding: 12px 30px; 
                    text-decoration: none; 
                    border-radius: 5px; 
                    margin: 20px 0;
                }
                .footer { padding: 20px; text-align: center; color: #666; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>Welcome to DsignLoft!</h1>
                </div>
                <div class='content'>
                    <h2>Hello " . htmlspecialchars($fullName) . ",</h2>
                    <p>Thank you for signing up with DsignLoft! To complete your registration and access your dashboard, please confirm your email address by clicking the button below:</p>
                    
                    <p style='text-align: center;'>
                        <a href='" . $confirmationLink . "' class='button'>Confirm Email Address</a>
                    </p>
                    
                    <p>If the button doesn't work, you can copy and paste this link into your browser:</p>
                    <p style='word-break: break-all; background: #eee; padding: 10px; border-radius: 3px;'>" . $confirmationLink . "</p>
                    
                    <p><strong>Important:</strong> This confirmation link will expire in 24 hours for security reasons.</p>
                    
                    <p>If you didn't create an account with DsignLoft, you can safely ignore this email.</p>
                    
                    <p>Best regards,<br>The DsignLoft Team</p>
                </div>
                <div class='footer'>
                    <p>This is an automated message. Please do not reply to this email.</p>
                    <p>&copy; 2024 DsignLoft. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>
        ";
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: DsignLoft <noreply@dsignloft.com>" . "\r\n";
        $headers .= "Reply-To: support@dsignloft.com" . "\r\n";
        
        // For development/testing, log the email instead of sending
        if ($this->isTestEnvironment()) {
            $this->logEmail($email, $subject, $message);
            return true;
        }
        
        return mail($email, $subject, $message, $headers);
    }
    
    /**
     * Get base URL for confirmation links
     */
    private function getBaseUrl() {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $path = dirname($_SERVER['SCRIPT_NAME']);
        return $protocol . '://' . $host . rtrim($path, '/');
    }
    
    /**
     * Check if we're in test environment
     */
    private function isTestEnvironment() {
        return true; // For development, always log emails instead of sending
    }
    
    /**
     * Log email for testing purposes
     */
    private function logEmail($email, $subject, $message) {
        $logFile = __DIR__ . '/../email_logs.txt';
        $logEntry = "\n" . str_repeat("=", 80) . "\n";
        $logEntry .= "Date: " . date('Y-m-d H:i:s') . "\n";
        $logEntry .= "To: " . $email . "\n";
        $logEntry .= "Subject: " . $subject . "\n";
        $logEntry .= "Message:\n" . $message . "\n";
        $logEntry .= str_repeat("=", 80) . "\n";
        
        file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);
    }
}

// Handle requests
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input = json_decode(file_get_contents("php://input"), true);
    
    if (!$input) {
        http_response_code(400);
        echo json_encode(["success" => false, "error" => "Invalid JSON input"]);
        exit();
    }
    
    $action = $input['action'] ?? '';
    $emailConfirmation = new EmailConfirmation();
    
    switch ($action) {
        case 'send_confirmation':
            $email = trim($input['email'] ?? '');
            $fullName = trim($input['full_name'] ?? '');
            
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                http_response_code(400);
                echo json_encode(["success" => false, "error" => "Valid email is required"]);
                exit();
            }
            
            if (empty($fullName)) {
                http_response_code(400);
                echo json_encode(["success" => false, "error" => "Full name is required"]);
                exit();
            }
            
            $result = $emailConfirmation->sendConfirmationEmail($email, $fullName);
            echo json_encode($result);
            break;
            
        default:
            http_response_code(400);
            echo json_encode(["success" => false, "error" => "Invalid action"]);
            break;
    }
    
} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
    $token = $_GET['token'] ?? '';
    
    if (empty($token)) {
        http_response_code(400);
        echo json_encode(["success" => false, "error" => "Token is required"]);
        exit();
    }
    
    $emailConfirmation = new EmailConfirmation();
    $result = $emailConfirmation->verifyToken($token);
    echo json_encode($result);
    
} else {
    http_response_code(405);
    echo json_encode(["success" => false, "error" => "Method not allowed"]);
}
?>

