// User Profile Management Utilities
class UserProfileManager {
    constructor() {
        this.auth = window.firebaseAuth;
        this.db = window.firebaseDb;
        this.utils = window.firebaseUtils;
    }

    /**
     * Get current user profile data
     * @returns {Promise<Object|null>} User profile data or null if not authenticated
     */
    async getCurrentUserProfile() {
        try {
            const user = this.auth.currentUser;
            if (!user) {
                return null;
            }

            // Get additional user data from Firestore
            const userDoc = await this.utils.getDoc(this.utils.doc(this.db, 'users', user.uid));
            const userData = userDoc.exists() ? userDoc.data() : {};

            return {
                uid: user.uid,
                email: user.email,
                displayName: user.displayName,
                photoURL: user.photoURL,
                emailVerified: user.emailVerified,
                // Additional data from Firestore
                fullName: userData.fullName || user.displayName || '',
                userType: userData.userType || 'client',
                createdAt: userData.createdAt || null,
                updatedAt: userData.updatedAt || null,
                // Profile appearance sources
                profileImage: userData.profileImage || user.photoURL || this.generateAvatarUrl(user.displayName || user.email),
                initials: this.generateInitials(userData.fullName || user.displayName || user.email)
            };
        } catch (error) {
            console.error('Error getting user profile:', error);
            return null;
        }
    }

    /**
     * Update user profile data
     * @param {Object} profileData - Profile data to update
     * @returns {Promise<boolean>} Success status
     */
    async updateUserProfile(profileData) {
        try {
            const user = this.auth.currentUser;
            if (!user) {
                throw new Error('User not authenticated');
            }

            // Update Firebase Auth profile
            if (profileData.displayName || profileData.photoURL) {
                await this.utils.updateProfile(user, {
                    displayName: profileData.displayName || user.displayName,
                    photoURL: profileData.photoURL || user.photoURL
                });
            }

            // Update Firestore document
            const updateData = {
                ...profileData,
                updatedAt: new Date().toISOString()
            };

            await this.utils.updateDoc(this.utils.doc(this.db, 'users', user.uid), updateData);
            
            return true;
        } catch (error) {
            console.error('Error updating user profile:', error);
            return false;
        }
    }

    /**
     * Generate initials from full name or email
     * @param {string} name - Full name or email
     * @returns {string} Initials (2 characters)
     */
    generateInitials(name) {
        if (!name) return 'U';
        
        const parts = name.split(/[\s@]+/);
        if (parts.length >= 2) {
            return (parts[0][0] + parts[1][0]).toUpperCase();
        } else {
            return name.substring(0, 2).toUpperCase();
        }
    }

    /**
     * Generate avatar URL using a service like UI Avatars
     * @param {string} name - Name for avatar generation
     * @returns {string} Avatar URL
     */
    generateAvatarUrl(name) {
        const initials = this.generateInitials(name);
        const colors = ['667eea', '764ba2', '4285f4', '34a853', 'fbbc05', 'ea4335'];
        const color = colors[Math.abs(this.hashCode(name)) % colors.length];
        
        return `https://ui-avatars.com/api/?name=${encodeURIComponent(initials)}&background=${color}&color=ffffff&size=128&font-size=0.5&bold=true`;
    }

    /**
     * Simple hash function for consistent color selection
     * @param {string} str - String to hash
     * @returns {number} Hash code
     */
    hashCode(str) {
        let hash = 0;
        for (let i = 0; i < str.length; i++) {
            const char = str.charCodeAt(i);
            hash = ((hash << 5) - hash) + char;
            hash = hash & hash; // Convert to 32-bit integer
        }
        return hash;
    }

    /**
     * Check if user is authenticated
     * @returns {boolean} Authentication status
     */
    isAuthenticated() {
        return !!this.auth.currentUser;
    }

    /**
     * Sign out current user
     * @returns {Promise<boolean>} Success status
     */
    async signOut() {
        try {
            await this.utils.signOut(this.auth);
            return true;
        } catch (error) {
            console.error('Error signing out:', error);
            return false;
        }
    }

    /**
     * Listen for authentication state changes
     * @param {Function} callback - Callback function to execute on auth state change
     */
    onAuthStateChanged(callback) {
        return this.utils.onAuthStateChanged(this.auth, callback);
    }

    /**
     * Get user's profile picture URL with fallback
     * @param {Object} user - User object
     * @returns {string} Profile picture URL
     */
    getProfilePictureUrl(user) {
        if (user.photoURL) {
            return user.photoURL;
        }
        
        if (user.profileImage) {
            return user.profileImage;
        }
        
        return this.generateAvatarUrl(user.fullName || user.displayName || user.email);
    }

    /**
     * Format user display name
     * @param {Object} user - User object
     * @returns {string} Formatted display name
     */
    getDisplayName(user) {
        return user.fullName || user.displayName || user.email.split('@')[0];
    }

    /**
     * Get user type display text
     * @param {string} userType - User type code
     * @returns {string} Display text for user type
     */
    getUserTypeDisplay(userType) {
        const types = {
            'client': 'Client',
            'designer': 'Designer',
            'admin': 'Administrator'
        };
        return types[userType] || 'User';
    }
}

// Make UserProfileManager available globally
window.UserProfileManager = UserProfileManager;

console.log('User Profile Manager loaded successfully');

