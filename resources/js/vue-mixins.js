// Vue Mixins for common functionality

const modalMixin = {
    data() {
        return {
            // Modal states will be added dynamically
        }
    },
    methods: {
        openModal(modalId) {
            this[modalId + 'Open'] = true;
            document.body.classList.add('modal-open');
        },
        closeModal(modalId) {
            this[modalId + 'Open'] = false;
            document.body.classList.remove('modal-open');
        }
    }
};

const formMixin = {
    data() {
        return {
            loading: false,
            errors: [],
            successMessage: ''
        }
    },
    methods: {
        clearMessages() {
            this.errors = [];
            this.successMessage = '';
        },
        handleError(error) {
            this.loading = false;
            if (error.response && error.response.data) {
                if (error.response.data.errors) {
                    this.errors = Object.values(error.response.data.errors).flat();
                } else if (error.response.data.message) {
                    this.errors = [error.response.data.message];
                }
            } else {
                this.errors = ['An unexpected error occurred.'];
            }
        },
        handleSuccess(message) {
            this.loading = false;
            this.successMessage = message;
            this.errors = [];
        }
    }
};

const dropdownMixin = {
    data() {
        return {
            // Dropdown states will be added dynamically
        }
    },
    methods: {
        closeDropdown(dropdownId) {
            setTimeout(() => {
                this[dropdownId + 'Open'] = false;
            }, 150);
        }
    },
    mounted() {
        // Close dropdowns when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.vue-dropdown')) {
                Object.keys(this.$data).forEach(key => {
                    if (key.endsWith('Open') && key.includes('dropdown')) {
                        this[key] = false;
                    }
                });
            }
        });
    }
};

const tabsMixin = {
    data() {
        return {
            activeTab: 'default'
        }
    },
    methods: {
        switchTab(tabId) {
            this.activeTab = tabId;
            // Update URL hash if needed
            if (window.location.hash !== '#' + tabId) {
                window.history.pushState(null, null, '#' + tabId);
            }
        }
    },
    mounted() {
        // Initialize from URL hash
        const hash = window.location.hash.substring(1);
        if (hash) {
            this.activeTab = hash;
        }
        
        // Listen for hash changes
        window.addEventListener('hashchange', () => {
            const hash = window.location.hash.substring(1);
            if (hash) {
                this.activeTab = hash;
            }
        });
    }
};

// Export mixins for use in components
window.VueMixins = {
    modalMixin,
    formMixin,
    dropdownMixin,
    tabsMixin
};

