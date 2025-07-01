<?php
require_once 'config.php';

setCORSHeaders();

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    jsonResponse(['error' => 'Method not allowed'], 405);
}

try {
    // Get session token from headers or query parameters
    $sessionToken = $_GET['session_token'] ?? $_SERVER['HTTP_AUTHORIZATION'] ?? '';
    
    if (empty($sessionToken)) {
        jsonResponse(['error' => 'Session token required'], 401);
    }
    
    // Remove 'Bearer ' prefix if present
    $sessionToken = str_replace('Bearer ', '', $sessionToken);
    
    // Validate session
    $auth = new UserAuth();
    $user = $auth->validateSession($sessionToken);
    
    if (!$user) {
        jsonResponse(['error' => 'Invalid or expired session'], 401);
    }
    
    // Get user's brief data
    $briefManager = new BriefManager();
    $brief = $briefManager->getBriefByEmail($user['email']);
    
    if (!$brief) {
        jsonResponse([
            'success' => false,
            'error' => 'No brief data found for this user'
        ]);
    }
    
    // Format the response to match the expected structure
    $response = [
        'success' => true,
        'brief' => [
            'brand_name' => $brief['brand_name'] ?? '',
            'slogan' => $brief['slogan'] ?? '',
            'description' => $brief['description'] ?? '',
            'industry' => $brief['industry'] ?? '',
            'service_type' => $brief['package_type'] ?? '',
            'language' => 'English', // Default value
            'total_price' => $brief['total_price'] ?? '0',
            'project_status' => 'Active', // Default value
            'notes' => $brief['description'] ?? '',
            'deliverables' => [
                'Logo in AI and SVG format',
                'Typography guidelines',
                'Color palette',
                'Brand guidelines document'
            ],
            'colors' => json_decode($brief['colors'] ?? '[]', true),
            'style_attributes' => json_decode($brief['style'] ?? '{}', true),
            'design_inspiration' => json_decode($brief['logos'] ?? '[]', true),
            'color_requirements' => $brief['own_color'] ?? '',
            'attachments' => $brief['uploaded_file'] ?? 'No attachments',
            'other_notes' => $brief['description'] ?? '',
            'package_options' => json_decode($brief['package_options'] ?? '[]', true)
        ],
        'user' => [
            'id' => $user['id'],
            'email' => $user['email'],
            'full_name' => $user['full_name'],
            'user_type' => $user['user_type']
        ]
    ];
    
    jsonResponse($response);
    
} catch (Exception $e) {
    jsonResponse(['error' => $e->getMessage()], 500);
}
?>

