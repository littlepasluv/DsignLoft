class UserProfileManager {
    constructor() {
        this.auth = firebase.auth();
    }

    onAuthStateChanged(callback) {
        return this.auth.onAuthStateChanged(callback);
    }

    async signOut() {
        await this.auth.signOut();
    }

    async getCurrentUserProfile() {
        const firebaseUser = this.auth.currentUser;
        if (!firebaseUser) {
            return null;
        }

        // Start with basic data from Firebase Auth
        let userProfile = {
            uid: firebaseUser.uid,
            email: firebaseUser.email,
            displayName: firebaseUser.displayName,
            initials: this.generateInitials(firebaseUser.displayName || firebaseUser.email),
        };

        try {
            // Fetch detailed profile from your Hostinger DB
            const response = await fetch(`api/get_user.php?uid=${firebaseUser.uid}`);
            if (response.ok) {
                const result = await response.json();
                if (result.status === 'success') {
                    // Combine data from your DB with Firebase data
                    userProfile.displayName = result.data.full_name || userProfile.displayName;
                    userProfile.userType = result.data.user_type;
                    userProfile.createdAt = result.data.created_at;
                    userProfile.initials = this.generateInitials(userProfile.displayName);
                }
            }
        } catch (error) {
            console.error("Could not fetch profile from Hostinger DB. Using fallback data.", error);
        }
        
        return userProfile;
    }

    generateInitials(name) {
        if (!name) return 'U';
        const parts = name.split(/[\s@]+/);
        return parts.length > 1 ? (parts[0][0] + parts[1][0]).toUpperCase() : name.substring(0, 2).toUpperCase();
    }
}