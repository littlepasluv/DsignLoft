// Firebase configuration
import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.22.0/firebase-app.js';
import {
  getAuth,
  signInWithEmailAndPassword,
  createUserWithEmailAndPassword,
  signInWithPopup,
  GoogleAuthProvider,
  signOut,
  onAuthStateChanged
} from 'https://www.gstatic.com/firebasejs/9.22.0/firebase-auth.js';

// Firebase config - replace with your actual config
const firebaseConfig = {
  apiKey: "AIzaSyDi3Ywxp625WnRxS4VSf_UBNPMHEYxE1ZE",
  authDomain: "dsignloft-app.firebaseapp.com",
  projectId: "dsignloft-app",
  storageBucket: "dsignloft-app.firebasestorage.app",
  messagingSenderId: "922560123733",
  appId: "1:922560123733:web:a2c448b4a0a210727e95dc"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const googleProvider = new GoogleAuthProvider();

// Export auth functions
window.firebaseAuth = {
  auth,
  signInWithEmailAndPassword,
  createUserWithEmailAndPassword,
  signInWithPopup,
  GoogleAuthProvider: googleProvider,
  signOut,
  onAuthStateChanged
};

// Centralized authentication state management
onAuthStateChanged(auth, (user) => {
  if (user) {
    // User is signed in
    if (window.location.pathname.includes('login.html') || window.location.pathname.includes('signup.html')) {
      window.location.href = '/dashboard.html';
    }
  } else {
    // User is signed out
    if (window.location.pathname.includes('dashboard.html')) {
      window.location.href = '/dsignloft-auth/login.html';
    }
  }
});


