// Firebase Configuration
const firebaseConfig = {
  apiKey: "AIzaSyDi3Ywxp625WnRxS4VSf_UBNPMHEYxE1ZE",
  authDomain: "dsignloft-app.firebaseapp.com",
  projectId: "dsignloft-app",
  storageBucket: "dsignloft-app.firebasestorage.app",
  messagingSenderId: "922560123733",
  appId: "1:922560123733:web:a2c448b4a0a210727e95dc"
};

// Initialize Firebase (only if not already initialized elsewhere)
// This file primarily holds the config, actual initialization and imports are done in login.html
// This is to avoid conflicts and ensure consistent Firebase SDK versioning.

// Export firebaseConfig for use in other files if needed
window.firebaseConfig = firebaseConfig;

console.log("Firebase config loaded.");


