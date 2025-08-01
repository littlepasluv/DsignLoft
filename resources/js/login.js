
            // --- This code runs when the page loads to pre-fill the email ---
            document.addEventListener("DOMContentLoaded", () => {
                try {
                    const urlParams = new URLSearchParams(window.location.search);
                    const email = urlParams.get("email");
                    if (email) {
                        document.getElementById("email").value = decodeURIComponent(email);
                    }
                } catch (e) { console.error("Could not parse email from URL", e); }
            });
            
            // Use the centralized Firebase configuration
            firebase.initializeApp(window.firebaseConfig);
            const auth = firebase.auth();
    
            const loginForm = document.getElementById("loginForm");
            const forgotPasswordLink = document.getElementById("forgotPasswordLink");
            const errorMessage = document.getElementById("errorMessage");
            const successMessage = document.getElementById("successMessage");
            const loading = document.getElementById("loading");
            const loginBtn = document.getElementById("loginBtn");
    
            function showMessage(message, type) {
                const el = type === "success" ? successMessage : errorMessage;
                const otherEl = type === "success" ? errorMessage : successMessage;
                el.textContent = message;
                el.style.display = "block";
                otherEl.style.display = "none";
            }
    
            function showLoading(show) {
                loading.style.display = show ? "block" : "none";
                loginBtn.disabled = show;
            }
            
            /**
             * Checks for brief data in localStorage and saves it to the database
             * after a successful login.
             */
            async function saveBriefAfterLogin(uid) {
                const briefDataString = localStorage.getItem("creativeBriefData");
                if (briefDataString) {
                    console.log("Found brief data after login. Saving to database...");
                    try {
                        const briefData = JSON.parse(briefDataString);
                        await fetch("api/save_brief.php", {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify({ firebase_uid: uid, brief: briefData })
                        });
                        // Clear the temporary data after saving
                        localStorage.removeItem("creativeBriefData");
                    } catch (error) {
                        console.error("Failed to save brief after login:", error);
                    }
                }
            }
    
            loginForm.addEventListener("submit", async (e) => {
                e.preventDefault();
                const email = document.getElementById("email").value.trim();
                const password = document.getElementById("password").value;
    
                if (!email || !password) {
                    showMessage("Please enter both email and password", "error");
                    return;
                }
                showLoading(true);
    
                try {
                    const userCredential = await auth.signInWithEmailAndPassword(email, password);
                    
                    // Check if user has verified their email
                    if (userCredential.user.emailVerified) {
                       
                        // **THE FIX:** Save any pending brief data before redirecting
                        await saveBriefAfterLogin(userCredential.user.uid);
                        
                        // Now, redirect to the dashboard
                        window.location.href = "dashboard.html";
                    } else {
                        showMessage("Please verify your email address before signing in.", "error");
                        showLoading(false);
                    }
                } catch (error) {
                    showMessage(error.message, "error");
                    showLoading(false);
                }
            });
    
            forgotPasswordLink.addEventListener("click", async (e) => {
                e.preventDefault();
                const email = document.getElementById("email").value.trim();
                if (!email) {
                    showMessage("Please enter your email address to reset your password.", "error");
                    return;
                }
                try {
                    await auth.sendPasswordResetEmail(email);
                    showMessage("Password reset email sent! Please check your inbox.", "success");
                } catch (error) {
                    showMessage(error.message, "error");
                }
            });
       