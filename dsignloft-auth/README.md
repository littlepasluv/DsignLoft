# DsignLoft Authentication System

A complete authentication and dashboard system for DsignLoft using Firebase Authentication for user login/signup and PHP/MySQL for data storage.

## Features

- **Firebase Authentication**: Email/Password and Google Sign-In
- **Session Persistence**: Users stay logged in across page refreshes
- **MySQL Integration**: User data and creative briefs stored in MySQL database
- **Responsive Design**: Works on desktop and mobile devices
- **Protected Pages**: Dashboard requires authentication
- **Creative Brief System**: Users can submit and view their project briefs

## Files Structure

```
dsignloft-app/
├── firebase-config.js      # Firebase configuration and auth functions
├── signup.html            # User registration page with Firebase auth
├── login.html             # User login page with Firebase auth
├── dashboard.html         # Protected dashboard page
├── index.html             # Landing page with services
├── register_user.php      # PHP script to store user email in MySQL
├── submit_brief.php       # PHP script to store creative briefs
├── load_brief.php         # PHP script to retrieve user briefs
└── README.md              # This file
```

## Setup Instructions

### 1. Firebase Configuration

1. The `firebase-config.js` file already contains the Firebase configuration
2. Make sure your Firebase project has Authentication enabled
3. Enable Email/Password and Google Sign-In providers in Firebase Console

### 2. Database Configuration

Update the database credentials in all PHP files:

```php
$host = 'localhost';
$dbname = 'u123456789_dsignloft'; // Replace with your actual database name
$username = 'u123456789_user';    // Replace with your actual database username
$password = 'your_password';       // Replace with your actual database password
```

### 3. Database Tables

The PHP scripts will automatically create the required tables:

- `users` table: Stores user information (email, name, type)
- `briefs` table: Stores creative brief submissions

### 4. Hosting Setup

1. Upload all files to your Hostinger hosting directory: `/public_html/app.dsignloft.com/`
2. Ensure PHP is enabled on your hosting account
3. Make sure MySQL database is accessible

### 5. Testing

1. Open `index.html` in your browser
2. Click "Get Started" to test signup
3. Try both email/password and Google Sign-In
4. Verify dashboard access after login
5. Test logout functionality

## User Flow

1. **Landing Page** (`index.html`): Users can browse services and sign up
2. **Signup** (`signup.html`): Users create account with Firebase, email stored in MySQL
3. **Login** (`login.html`): Users sign in with Firebase credentials
4. **Dashboard** (`dashboard.html`): Protected page showing user info and briefs
5. **Brief Management**: Users can submit and view creative briefs

## Security Features

- Firebase handles all authentication securely
- PHP uses prepared statements to prevent SQL injection
- CORS headers properly configured for cross-origin requests
- Session state managed by Firebase Auth
- Protected pages redirect unauthorized users to login

## Browser Compatibility

- Modern browsers with ES6 module support
- Firebase SDK v9 with modular imports
- Responsive design for mobile devices

## Troubleshooting

1. **Firebase not loading**: Check console for errors, ensure internet connection
2. **Database connection failed**: Verify MySQL credentials and database exists
3. **CORS errors**: Ensure proper CORS headers in PHP files
4. **Login redirect issues**: Check Firebase Auth state observer implementation

## Customization

- Update logo URLs in HTML files
- Modify color scheme by changing CSS variables
- Add more fields to brief submission form
- Customize dashboard layout and content

## Support

For issues with:
- Firebase Authentication: Check Firebase Console and documentation
- Database connectivity: Verify Hostinger MySQL settings
- Hosting issues: Contact Hostinger support

