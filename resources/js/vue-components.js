// Vue Components for enhanced interactivity

// Global Vue component for toast notifications
const ToastNotification = {
    template: `
        <div class="toast-container">
            <div 
                v-for="toast in toasts" 
                :key="toast.id"
                class="toast"
                :class="'toast-' + toast.type"
            >
                <div class="toast-content">
                    <i :class="getToastIcon(toast.type)"></i>
                    <span>{{ toast.message }}</span>
                </div>
                <button @click="removeToast(toast.id)" class="toast-close">&times;</button>
            </div>
        </div>
    `,
    data() {
        return {
            toasts: []
        }
    },
    methods: {
        addToast(message, type = 'info', duration = 5000) {
            const id = Date.now();
            this.toasts.push({ id, message, type });
            
            if (duration > 0) {
                setTimeout(() => {
                    this.removeToast(id);
                }, duration);
            }
        },
        removeToast(id) {
            const index = this.toasts.findIndex(toast => toast.id === id);
            if (index > -1) {
                this.toasts.splice(index, 1);
            }
        },
        getToastIcon(type) {
            const icons = {
                success: 'fas fa-check-circle',
                error: 'fas fa-exclamation-circle',
                warning: 'fas fa-exclamation-triangle',
                info: 'fas fa-info-circle'
            };
            return icons[type] || icons.info;
        }
    }
};

// Global Vue component for loading spinner
const LoadingSpinner = {
    template: `
        <div v-if="show" class="loading-spinner-overlay">
            <div class="loading-spinner">
                <div class="spinner"></div>
                <p v-if="message">{{ message }}</p>
            </div>
        </div>
    `,
    props: {
        show: {
            type: Boolean,
            default: false
        },
        message: {
            type: String,
            default: 'Loading...'
        }
    }
};

// Global Vue component for confirmation dialog
const ConfirmDialog = {
    template: `
        <div v-if="show" class="confirm-dialog-overlay" @click.self="cancel">
            <div class="confirm-dialog">
                <div class="confirm-dialog-header">
                    <h3>{{ title }}</h3>
                </div>
                <div class="confirm-dialog-body">
                    <p>{{ message }}</p>
                </div>
                <div class="confirm-dialog-footer">
                    <button @click="cancel" class="btn btn-secondary">{{ cancelText }}</button>
                    <button @click="confirm" class="btn btn-primary">{{ confirmText }}</button>
                </div>
            </div>
        </div>
    `,
    props: {
        show: {
            type: Boolean,
            default: false
        },
        title: {
            type: String,
            default: 'Confirm Action'
        },
        message: {
            type: String,
            default: 'Are you sure you want to proceed?'
        },
        confirmText: {
            type: String,
            default: 'Confirm'
        },
        cancelText: {
            type: String,
            default: 'Cancel'
        }
    },
    methods: {
        confirm() {
            this.$emit('confirm');
        },
        cancel() {
            this.$emit('cancel');
        }
    }
};

// Register global components
window.VueComponents = {
    ToastNotification,
    LoadingSpinner,
    ConfirmDialog
};

// Auto-register components when Vue is available
if (typeof Vue !== 'undefined') {
    Vue.component('toast-notification', ToastNotification);
    Vue.component('loading-spinner', LoadingSpinner);
    Vue.component('confirm-dialog', ConfirmDialog);
}

