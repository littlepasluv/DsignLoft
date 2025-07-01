<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Confirmation - DsignLoft</title>
    <link rel="icon" href="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/favicon-dsignloft-YKbl23wxwNT9WK37.png" type="image/png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .confirmation-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            padding: 40px;
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        
        .logo {
            margin-bottom: 30px;
        }
        
        .logo img {
            width: 150px;
        }
        
        .status-icon {
            font-size: 4rem;
            margin-bottom: 20px;
        }
        
        .success-icon {
            color: #28a745;
        }
        
        .error-icon {
            color: #dc3545;
        }
        
        .loading-icon {
            color: #53AB81;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        h1 {
            color: #333;
            margin-bottom: 15px;
            font-size: 1.8rem;
        }
        
        .message {
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
            font-size: 1.1rem;
        }
        
        .btn {
            display: inline-block;
            background: #53AB81;
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s ease;
            margin: 10px;
        }
        
        .btn:hover {
            background: #45926e;
        }
        
        .btn-secondary {
            background: #6c757d;
        }
        
        .btn-secondary:hover {
            background: #5a6268;
        }
        
        .loading {
            display: none;
        }
        
        .success {
            display: none;
        }
        
        .error {
            display: none;
        }
        
        .user-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: left;
        }
        
        .user-info h3 {
            color: #333;
            margin-bottom: 10px;
        }
        
        .user-info p {
            color: #666;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <div class="logo">
            <img src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/logo_dsignloft-Y4LxQ4REjXhxO2a5.svg" alt="DsignLoft Logo">
        </div>
        
        <!-- Loading State -->
        <div id="loading-state" class="loading">
            <div class="status-icon loading-icon">⟳</div>
            <h1>Confirming Your Email...</h1>
            <p class="message">Please wait while we verify your email address.</p>
        </div>
        
        <!-- Success State -->
        <div id="success-state" class="success">
            <div class="status-icon success-icon">✓</div>
            <h1>Email Confirmed Successfully!</h1>
            <p class="message">Your email has been verified and your account is now active. You can now access your dashboard.</p>
            
            <div id="user-info" class="user-info" style="display: none;">
                <h3>Account Details:</h3>
                <p><strong>Email:</strong> <span id="user-email"></span></p>
                <p><strong>Name:</strong> <span id="user-name"></span></p>
            </div>
            
            <a href="../dashboard.html" class="btn">Go to Dashboard</a>
            <a href="login.html" class="btn btn-secondary">Sign In</a>
        </div>
        
        <!-- Error State -->
        <div id="error-state" class="error">
            <div class="status-icon error-icon">✗</div>
            <h1>Confirmation Failed</h1>
            <p id="error-message" class="message">There was an issue confirming your email address.</p>
            
            <a href="signup.html" class="btn">Sign Up Again</a>
            <a href="login.html" class="btn btn-secondary">Sign In</a>
        </div>
    </div>

    <script>
        // Get token from URL
        const urlParams = new URLSearchParams(window.location.search);
        const token = urlParams.get('token');
        
        // Show loading state initially
        document.getElementById('loading-state').style.display = 'block';
        
        if (!token) {
            showError('No confirmation token provided');
        } else {
            confirmEmail(token);
        }
        
        async function confirmEmail(token) {
            try {
                const response = await fetch(`email_confirmation.php?token=${encodeURIComponent(token)}`);
                const result = await response.json();
                
                if (result.success) {
                    // Store session token and user info
                    localStorage.setItem('session_token', result.session_token);
                    localStorage.setItem('user_email', result.user.email);
                    localStorage.setItem('user_name', result.user.full_name);
                    localStorage.setItem('user_type', 'client');
                    
                    // Show user info
                    document.getElementById('user-email').textContent = result.user.email;
                    document.getElementById('user-name').textContent = result.user.full_name;
                    document.getElementById('user-info').style.display = 'block';
                    
                    showSuccess();
                } else {
                    showError(result.error || 'Email confirmation failed');
                }
            } catch (error) {
                console.error('Confirmation error:', error);
                showError('Network error occurred. Please try again.');
            }
        }
        
        function showSuccess() {
            document.getElementById('loading-state').style.display = 'none';
            document.getElementById('error-state').style.display = 'none';
            document.getElementById('success-state').style.display = 'block';
        }
        
        function showError(message) {
            document.getElementById('loading-state').style.display = 'none';
            document.getElementById('success-state').style.display = 'none';
            document.getElementById('error-message').textContent = message;
            document.getElementById('error-state').style.display = 'block';
        }
    </script>
</body>
</html>

