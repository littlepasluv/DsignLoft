const { createApp } = Vue;

createApp({
    data() {
        return {
            // Tab management
            activeTab: 'brief',
            
            // User dropdown
            showUserDropdown: false,
            
            // Brief data
            briefData: {
                projectTitle: '',
                package: '',
                projectDurationWebsite: '',
                projectDuration: '',
                guaranteed: '',
                nda: '',
                printOptions: '',
                language: 'English',
                brandName: '',
                slogan: '',
                description: '',
                industry: '',
                notes: '',
                colors: ['#000000'],
                styleAttributes: {},
                designInspiration: [],
                deliverables: [],
                filesDeliverables: [],
                finalFiles: []
            },
            
            // Edit brief modal
            showEditBriefModal: false,
            editBriefData: {},
            updatingBrief: false,
            
            // Files data
            projectFiles: [],
            deliverableFiles: [],
            
            // Upload modal
            showUploadModal: false,
            selectedFiles: [],
            uploadProgress: [],
            uploading: false,
            isDragOver: false,
            
            // Messages data
            messages: [],
            projectUpdates: [],
            newMessage: '',
            messageAttachments: [],
            sendingMessage: false,
            
            // Attachment modal
            showAttachmentModal: false,
            selectedAttachments: [],
            isAttachmentDragOver: false,
            
            // Payment data
            paymentData: {
                total: 0,
                secured: 0,
                released: 0,
                earnings: 0,
                subtotal: 0,
                tax: 0,
                isPaid: false
            },
            invoiceItems: [],
            
            // Payment modal
            showPaymentModal: false,
            paymentMethod: 'card',
            cardData: {
                number: '',
                name: '',
                expiry: '',
                cvc: ''
            },
            saveCard: false,
            processingPayment: false,
            
            // Complete project modal
            showCompleteProjectModal: false,
            projectRating: 0,
            projectFeedback: '',
            allowTestimonial: false,
            completingProject: false,
            
            // New quote modal
            showNewQuoteModal: false,
            newQuoteData: {
                projectTitle: '',
                projectType: '',
                description: '',
                deadline: '',
                budgetRange: '',
                services: [],
                notes: '',
                contactName: '',
                contactEmail: ''
            },
            creatingQuote: false
        };
    },
    
    computed: {
        isPaymentFormValid() {
            if (this.paymentMethod === 'card') {
                return this.cardData.number && 
                       this.cardData.name && 
                       this.cardData.expiry && 
                       this.cardData.cvc;
            }
            return this.paymentMethod === 'paypal';
        },
        
        isNewQuoteFormValid() {
            return this.newQuoteData.projectTitle && 
                   this.newQuoteData.projectType && 
                   this.newQuoteData.description && 
                   this.newQuoteData.contactName && 
                   this.newQuoteData.contactEmail;
        }
    },
    
    methods: {
        // Tab management
        switchTab(tab) {
            this.activeTab = tab;
            this.showUserDropdown = false;
        },
        
        // User dropdown
        toggleUserDropdown() {
            this.showUserDropdown = !this.showUserDropdown;
        },
        
        signOut() {
            // Implement sign out logic
            console.log('Signing out...');
        },
        
        // Brief management
        openEditBriefModal() {
            this.editBriefData = { ...this.briefData };
            this.showEditBriefModal = true;
        },
        
        closeEditBriefModal() {
            this.showEditBriefModal = false;
            this.editBriefData = {};
        },
        
        updateBrief() {
            this.updatingBrief = true;
            
            // Simulate API call
            setTimeout(() => {
                this.briefData = { ...this.editBriefData };
                this.updatingBrief = false;
                this.closeEditBriefModal();
                this.showNotification('Brief updated successfully!');
            }, 1500);
        },
        
        addColor() {
            this.editBriefData.colors.push('#000000');
        },
        
        removeColor(index) {
            this.editBriefData.colors.splice(index, 1);
        },
        
        // File management
        openUploadModal() {
            this.showUploadModal = true;
            this.selectedFiles = [];
            this.uploadProgress = [];
        },
        
        closeUploadModal() {
            this.showUploadModal = false;
            this.selectedFiles = [];
            this.uploadProgress = [];
            this.isDragOver = false;
        },
        
        handleFileSelect(event) {
            const files = Array.from(event.target.files);
            this.selectedFiles = [...this.selectedFiles, ...files];
        },
        
        handleFileDrop(event) {
            event.preventDefault();
            this.isDragOver = false;
            const files = Array.from(event.dataTransfer.files);
            this.selectedFiles = [...this.selectedFiles, ...files];
        },
        
        removeSelectedFile(index) {
            this.selectedFiles.splice(index, 1);
        },
        
        uploadFiles() {
            this.uploading = true;
            this.uploadProgress = this.selectedFiles.map(file => ({
                fileName: file.name,
                percentage: 0
            }));
            
            // Simulate file upload progress
            this.selectedFiles.forEach((file, index) => {
                const interval = setInterval(() => {
                    this.uploadProgress[index].percentage += 10;
                    
                    if (this.uploadProgress[index].percentage >= 100) {
                        clearInterval(interval);
                        
                        // Add to project files
                        this.projectFiles.push({
                            id: Date.now() + index,
                            name: file.name,
                            size: this.formatFileSize(file.size),
                            uploadDate: new Date().toLocaleDateString()
                        });
                        
                        // Check if all files are uploaded
                        if (this.uploadProgress.every(p => p.percentage >= 100)) {
                            setTimeout(() => {
                                this.uploading = false;
                                this.closeUploadModal();
                                this.showNotification('Files uploaded successfully!');
                            }, 500);
                        }
                    }
                }, 200);
            });
        },
        
        downloadFile(file) {
            console.log('Downloading file:', file.name);
            this.showNotification('Download started for ' + file.name);
        },
        
        previewFile(file) {
            console.log('Previewing file:', file.name);
            this.showNotification('Opening preview for ' + file.name);
        },
        
        downloadDeliverable(deliverable) {
            console.log('Downloading deliverable:', deliverable.name);
            this.showNotification('Download started for ' + deliverable.name);
        },
        
        previewDeliverable(deliverable) {
            console.log('Previewing deliverable:', deliverable.name);
            this.showNotification('Opening preview for ' + deliverable.name);
        },
        
        // Message management
        sendMessage() {
            if (!this.newMessage.trim()) return;
            
            this.sendingMessage = true;
            
            // Simulate sending message
            setTimeout(() => {
                this.messages.push({
                    id: Date.now(),
                    content: this.newMessage,
                    fromClient: true,
                    timestamp: new Date(),
                    attachments: [...this.messageAttachments]
                });
                
                this.newMessage = '';
                this.messageAttachments = [];
                this.sendingMessage = false;
                
                // Scroll to bottom of messages
                this.$nextTick(() => {
                    const container = this.$refs.messagesContainer;
                    if (container) {
                        container.scrollTop = container.scrollHeight;
                    }
                });
                
                this.showNotification('Message sent successfully!');
            }, 1000);
        },
        
        openAttachmentModal() {
            this.showAttachmentModal = true;
            this.selectedAttachments = [];
        },
        
        closeAttachmentModal() {
            this.showAttachmentModal = false;
            this.selectedAttachments = [];
            this.isAttachmentDragOver = false;
        },
        
        handleAttachmentSelect(event) {
            const files = Array.from(event.target.files);
            this.selectedAttachments = [...this.selectedAttachments, ...files];
        },
        
        handleAttachmentDrop(event) {
            event.preventDefault();
            this.isAttachmentDragOver = false;
            const files = Array.from(event.dataTransfer.files);
            this.selectedAttachments = [...this.selectedAttachments, ...files];
        },
        
        removeSelectedAttachment(index) {
            this.selectedAttachments.splice(index, 1);
        },
        
        addAttachmentsToMessage() {
            this.messageAttachments = [...this.messageAttachments, ...this.selectedAttachments];
            this.closeAttachmentModal();
            this.showNotification(`${this.selectedAttachments.length} attachment(s) added to message`);
        },
        
        removeAttachment(index) {
            this.messageAttachments.splice(index, 1);
        },
        
        // Payment management
        openPaymentModal() {
            this.showPaymentModal = true;
        },
        
        closePaymentModal() {
            this.showPaymentModal = false;
            this.paymentMethod = 'card';
            this.cardData = {
                number: '',
                name: '',
                expiry: '',
                cvc: ''
            };
        },
        
        processPayment() {
            this.processingPayment = true;
            
            // Simulate payment processing
            setTimeout(() => {
                this.paymentData.isPaid = true;
                this.paymentData.released = this.paymentData.total;
                this.paymentData.secured = 0;
                
                this.processingPayment = false;
                this.closePaymentModal();
                this.showNotification('Payment completed successfully!');
            }, 3000);
        },
        
        processCardPayment() {
            this.processPayment();
        },
        
        formatCardNumber() {
            // Format card number with spaces
            let value = this.cardData.number.replace(/\s/g, '');
            let formattedValue = value.replace(/(.{4})/g, '$1 ').trim();
            this.cardData.number = formattedValue;
        },
        
        formatExpiry() {
            // Format expiry date as MM/YY
            let value = this.cardData.expiry.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            this.cardData.expiry = value;
        },
        
        // Project completion
        openCompleteProjectModal() {
            this.showCompleteProjectModal = true;
        },
        
        closeCompleteProjectModal() {
            this.showCompleteProjectModal = false;
            this.projectRating = 0;
            this.projectFeedback = '';
            this.allowTestimonial = false;
        },
        
        completeProject() {
            this.completingProject = true;
            
            // Simulate project completion
            setTimeout(() => {
                this.completingProject = false;
                this.closeCompleteProjectModal();
                this.showNotification('Project completed successfully!');
            }, 2000);
        },
        
        // New quote
        openNewQuoteModal() {
            this.showNewQuoteModal = true;
        },
        
        closeNewQuoteModal() {
            this.showNewQuoteModal = false;
            this.newQuoteData = {
                projectTitle: '',
                projectType: '',
                description: '',
                deadline: '',
                budgetRange: '',
                services: [],
                notes: '',
                contactName: '',
                contactEmail: ''
            };
        },
        
        createNewQuote() {
            this.creatingQuote = true;
            
            // Simulate quote creation
            setTimeout(() => {
                this.creatingQuote = false;
                this.closeNewQuoteModal();
                this.showNotification('New quote created successfully!');
            }, 2000);
        },
        
        // Utility methods
        formatCurrency(amount) {
            return new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD'
            }).format(amount);
        },
        
        formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        },
        
        formatDate(date) {
            return new Date(date).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        },
        
        isImageFile(file) {
            return file.type.startsWith('image/');
        },
        
        isPdfFile(file) {
            return file.type === 'application/pdf';
        },
        
        showNotification(message) {
            // Simple notification system
            const notification = document.createElement('div');
            notification.className = 'notification';
            notification.textContent = message;
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: #53AB81;
                color: white;
                padding: 12px 20px;
                border-radius: 4px;
                z-index: 10000;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        },
        
        // Initialize data
        loadBriefData() {
            // Simulate loading brief data
            this.briefData = {
                projectTitle: 'Modern Logo Design',
                package: 'Premium Package',
                language: 'English',
                brandName: 'TechStart Inc.',
                slogan: 'Innovation at its finest',
                description: 'A modern tech startup looking for a clean, professional logo design.',
                industry: 'Technology',
                notes: 'Prefer minimalist design with blue color scheme.',
                colors: ['#2563eb', '#1e40af', '#3b82f6'],
                styleAttributes: {
                    'Modern': 85,
                    'Professional': 90,
                    'Creative': 75,
                    'Minimalist': 95
                },
                designInspiration: [],
                deliverables: [
                    'Logo design concepts (3 initial concepts)',
                    'Unlimited revisions',
                    'Final logo files in multiple formats',
                    'Brand guidelines document'
                ],
                filesDeliverables: [
                    { name: 'Logo_Concept_1.ai', format: 'Adobe Illustrator' },
                    { name: 'Logo_Final.png', format: 'PNG' },
                    { name: 'Logo_Final.svg', format: 'SVG' }
                ],
                finalFiles: []
            };
        },
        
        loadPaymentData() {
            // Simulate loading payment data
            this.paymentData = {
                total: 599.00,
                secured: 599.00,
                released: 0,
                earnings: 0,
                subtotal: 549.00,
                tax: 50.00,
                isPaid: false
            };
            
            this.invoiceItems = [
                {
                    id: 1,
                    name: 'Premium Logo Design Package',
                    description: 'Complete logo design with 3 concepts and unlimited revisions',
                    amount: 549.00
                },
                {
                    id: 2,
                    name: 'Tax',
                    description: 'Sales tax',
                    amount: 50.00
                }
            ];
        }
    },
    
    mounted() {
        // Hide loading overlay
        const loadingOverlay = document.getElementById('loading-overlay');
        if (loadingOverlay) {
            setTimeout(() => {
                loadingOverlay.style.display = 'none';
            }, 1000);
        }
        
        // Load initial data
        this.loadBriefData();
        this.loadPaymentData();
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', (event) => {
            if (!event.target.closest('.user-section')) {
                this.showUserDropdown = false;
            }
        });
    }
}).mount('#dashboard-app');

