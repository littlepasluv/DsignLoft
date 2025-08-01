    document.addEventListener("DOMContentLoaded", () => {
        const urlParams = new URLSearchParams(window.location.search);
        const email = urlParams.get("email");
        if (email) {
            document.getElementById("email").value = decodeURIComponent(email);
        }
    });

    // Use the centralized Firebase configuration
    firebase.initializeApp(window.firebaseConfig);
    const auth = firebase.auth();

    const signupForm = document.getElementById("signupForm");
    const messageDiv = document.getElementById("messageDiv");
    const signupBtn = document.getElementById("signupBtn");

    function showMessage(message, type) {
        messageDiv.textContent = message;
        messageDiv.className = `message ${type}`;
        messageDiv.style.display = "block";
    }

    async function saveUserToDatabase(uid, email, fullName) {
        try {
            await fetch("api/save_user.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ firebase_uid: uid, email: email, fullName: fullName })
            });
        } catch (error) {
            console.error("Could not save user to Hostinger DB:", error);
        }
    }

    // In signup.html

    // This function retrieves the brief from localStorage and saves it to the backend.
    async function saveBriefToDatabase(uid) {
        const briefDataString = localStorage.getItem("creativeBriefData");
        if (!briefDataString) return; // Do nothing if no brief data exists
        try {
            const briefData = JSON.parse(briefDataString);
            await fetch("api/save_brief.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ firebase_uid: uid, brief: briefData })
            });
            // Important: Clear the temporary data after it has been saved.
            localStorage.removeItem("creativeBriefData");
        } catch (error) {
            console.error("Could not save brief to Hostinger DB:", error);
        }
    }

    signupForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        signupBtn.disabled = true;
        showMessage("Processing...", "success");

        const fullName = document.getElementById("fullName").value.trim();
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value;

        try {
            // 1. Create user in Firebase
            const userCredential = await auth.createUserWithEmailAndPassword(email, password);
            const user = userCredential.user;

            // 2. Update their Firebase profile
            await user.updateProfile({ displayName: fullName });
            
            // 3. Save user and brief to your Hostinger database
            await saveUserToDatabase(user.uid, user.email, fullName);
            await saveBriefToDatabase(user.uid);

            // 4. Send verification email
            await user.sendEmailVerification();

            showMessage("Account created! Please check your email to verify.", "success");
            setTimeout(() => { window.location.href = "login.html"; }, 4000);

        } catch (error) {
            showMessage(error.message, "error");
            signupBtn.disabled = false;
        }
    });

