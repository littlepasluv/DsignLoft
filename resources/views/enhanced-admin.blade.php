@extends('layouts.dashboard')

@section('title', 'DsignLoft - Super Admin')

@section('dashboard-content')
<div id="super-admin-app">
    <!-- Toast Notifications -->
    <toast-notification ref="toast"></toast-notification>
    
    <!-- Loading Spinner -->
    <loading-spinner :show="globalLoading" message="Loading dashboard data..."></loading-spinner>
    
    <!-- Confirmation Dialog -->
    <confirm-dialog 
        :show="confirmDialog.show"
        :title="confirmDialog.title"
        :message="confirmDialog.message"
        @confirm="handleConfirm"
        @cancel="confirmDialog.show = false"
    ></confirm-dialog>

    <div class="content-section active" id="super-admin-section">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 flex flex-col gap-8">
                <!-- Stats Cards with Vue reactivity -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="rounded-lg p-4 bg-[var(--card-bg)] border border-[var(--border-color)]">
                        <h3 class="text-xl font-bold mb-2">Live Traffic Summary</h3>
                        <p class="text-sm text-[var(--text-secondary)]">Track real-time visits via Google Analytics</p>
                        <a href="https://analytics.google.com/" target="_blank" class="text-[var(--highlight)] underline">View Analytics Dashboard</a>
                    </div>
                    <div class="flex flex-col gap-2 rounded-lg p-6 bg-[var(--card-bg)] border border-[var(--border-color)]">
                        <div class="flex items-center justify-between">
                            <p class="text-[var(--text-secondary)] text-base font-medium">Total Revenue</p>
                            <span class="material-icons text-[var(--highlight)]">trending_up</span>
                        </div>
                        <p class="text-[var(--text-primary)] text-4xl font-bold">${{ '{{ stats.totalRevenue }}' }}</p>
                        <p class="text-sm text-[var(--text-secondary)]">{{ '{{ stats.revenueChange }}' }}% from last month</p>
                    </div>
                    <div class="flex flex-col gap-2 rounded-lg p-6 bg-[var(--card-bg)] border border-[var(--border-color)]">
                        <div class="flex items-center justify-between">
                            <p class="text-[var(--text-secondary)] text-base font-medium">New Users</p>
                            <span class="material-icons text-[#36a2eb]">person_add</span>
                        </div>
                        <p class="text-[var(--text-primary)] text-4xl font-bold">{{ '{{ stats.newUsers }}' }}</p>
                        <p class="text-sm text-[var(--text-secondary)]">{{ '{{ stats.newUsersChange }}' }} this week</p>
                    </div>
                </div>
                
                <!-- Enhanced Service Requests Table with Vue -->
                <div class="bg-[var(--card-bg)] rounded-lg border border-[var(--border-color)]">
                    <div class="flex justify-between items-center p-4 border-b border-[var(--border-color)]">
                        <h2 class="text-xl font-bold text-[var(--text-primary)]">Recent Service Requests</h2>
                        <div class="flex gap-2">
                            <button @click="refreshServiceRequests" class="btn btn-secondary btn-sm">
                                <i class="fas fa-refresh"></i> Refresh
                            </button>
                            <a class="text-sm font-medium text-[var(--highlight)] hover:text-[var(--highlight-hover)]" href="#">View All</a>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-[var(--sidebar-bg)]">
                                <tr>
                                    <th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Service</th>
                                    <th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Client</th>
                                    <th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Assigned To</th>
                                    <th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[var(--border-color)]">
                                <tr v-for="request in serviceRequests" :key="request.id">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-primary)]">{{ '{{ request.service }}' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">{{ '{{ request.client }}' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span :class="'badge-' + request.status.toLowerCase().replace(' ', '-')" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium">
                                            {{ '{{ request.status }}' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">{{ '{{ request.assignedTo || "-" }}' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <x-ui.vue-dropdown 
                                            :id="'request-' + request.id" 
                                            label="Actions"
                                            :items="getRequestActions(request)"
                                        />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="lg:col-span-1 flex flex-col gap-8">
                <!-- Quick Actions with Vue -->
                <div class="bg-[var(--card-bg)] rounded-lg border border-[var(--border-color)] p-4">
                    <h3 class="text-xl font-bold text-[var(--text-primary)] mb-4">Content Quick Actions</h3>
                    <div class="flex flex-col gap-3">
                        <button @click="openNewPostModal" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-[var(--highlight)] text-white rounded-md hover:bg-[var(--highlight-hover)] text-sm font-medium"> 
                            <span class="material-icons text-lg">add</span>New Blog Post 
                        </button>
                        <button @click="openManagePagesModal" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-[var(--nav-hover-bg)] text-[var(--text-primary)] rounded-md hover:bg-opacity-80 text-sm font-medium"> 
                            <span class="material-icons text-lg">edit</span>Manage Pages 
                        </button>
                        <button @click="openUploadMediaModal" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-[var(--nav-hover-bg)] text-[var(--text-primary)] rounded-md hover:bg-opacity-80 text-sm font-medium"> 
                            <span class="material-icons text-lg">upload_file</span>Upload Media 
                        </button>
                    </div>
                </div>
                
                <!-- User Management with Vue -->
                <div class="bg-[var(--card-bg)] rounded-lg border border-[var(--border-color)]">
                    <div class="flex justify-between items-center p-4 border-b border-[var(--border-color)]">
                        <h3 class="text-xl font-bold text-[var(--text-primary)]">User Management</h3>
                        <a class="text-sm font-medium text-[var(--highlight)] hover:text-[var(--highlight-hover)]" href="#">All Users</a>
                    </div>
                    <ul class="divide-y divide-[var(--border-color)]">
                        <li v-for="user in recentUsers" :key="user.id" class="p-4 flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <img :alt="user.name + ' Avatar'" class="w-10 h-10 rounded-full" :src="user.avatar"/>
                                <div>
                                    <p class="text-sm font-medium text-[var(--text-primary)]">{{ '{{ user.name }}' }}</p>
                                    <p class="text-xs text-[var(--text-secondary)]">{{ '{{ user.role }}' }}</p>
                                </div>
                            </div>
                            <span :class="'badge-' + user.status" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium">
                                {{ '{{ user.status.charAt(0).toUpperCase() + user.status.slice(1) }}' }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <x-ui.vue-modal id="newPost" title="Create New Blog Post" size="lg">
        <x-ui.vue-form id="newPostForm">
            <div class="form-group">
                <label for="postTitle">Post Title</label>
                <input type="text" id="postTitle" v-model="newPost.title" required>
            </div>
            <div class="form-group">
                <label for="postContent">Content</label>
                <textarea id="postContent" v-model="newPost.content" rows="6" required></textarea>
            </div>
        </x-ui.vue-form>
        <x-slot name="footer">
            <button @click="closeNewPostModal" class="btn btn-secondary">Cancel</button>
            <button @click="saveNewPost" class="btn btn-primary">Save Post</button>
        </x-slot>
    </x-ui.vue-modal>
</div>

@push('scripts')
<script>
const { createApp } = Vue;

createApp({
    mixins: [
        VueMixins.modalMixin,
        VueMixins.formMixin,
        VueMixins.dropdownMixin
    ],
    data() {
        return {
            activeSection: 'super-admin',
            sidebarCollapsed: false,
            globalLoading: false,
            confirmDialog: {
                show: false,
                title: '',
                message: '',
                callback: null
            },
            stats: {
                totalRevenue: '125,430',
                revenueChange: '+8',
                newUsers: '245',
                newUsersChange: '+15'
            },
            serviceRequests: [
                {
                    id: 1,
                    service: 'Logo Design',
                    client: 'Innovate LLC',
                    status: 'In Progress',
                    assignedTo: 'Sarah Miller'
                },
                {
                    id: 2,
                    service: 'UI/UX Audit',
                    client: 'FutureTech',
                    status: 'Completed',
                    assignedTo: 'David Chen'
                }
            ],
            recentUsers: [
                {
                    id: 1,
                    name: 'Jane Doe',
                    role: 'Client',
                    status: 'active',
                    avatar: 'https://lh3.googleusercontent.com/a/ACg8ocJdC-4O-3oPz_w_dD8-2Jgq2Yc7aPq9oK3n4z7H2Q=s96-c'
                },
                {
                    id: 2,
                    name: 'John Smith',
                    role: 'Designer',
                    status: 'active',
                    avatar: 'https://lh3.googleusercontent.com/a/ACg8ocK_sA4b-2WzQYJ2X1T_2Z1z5kG9X2m2YwU6K2G2uE=s96-c'
                }
            ],
            newPost: {
                title: '',
                content: ''
            },
            // Modal states
            newPostOpen: false,
            managePagesOpen: false,
            uploadMediaOpen: false
        }
    },
    methods: {
        switchSection(section) {
            this.activeSection = section;
            document.getElementById('header-title').textContent = this.getSectionTitle(section);
        },
        getSectionTitle(section) {
            const titles = {
                'super-admin': 'Super Admin Dashboard',
                'content': 'Content Management',
                'users': 'User Management',
                'messages': 'Messages',
                'payments': 'Payments',
                'services': 'Services'
            };
            return titles[section] || 'Dashboard';
        },
        toggleSidebar() {
            this.sidebarCollapsed = !this.sidebarCollapsed;
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            
            if (this.sidebarCollapsed) {
                sidebar.classList.add('collapsed');
                mainContent.classList.add('expanded');
            } else {
                sidebar.classList.remove('collapsed');
                mainContent.classList.remove('expanded');
            }
        },
        toggleTheme() {
            document.body.classList.toggle('dark-theme');
            localStorage.setItem('theme', document.body.classList.contains('dark-theme') ? 'dark' : 'light');
        },
        refreshServiceRequests() {
            this.globalLoading = true;
            // Simulate API call
            setTimeout(() => {
                this.globalLoading = false;
                this.$refs.toast.addToast('Service requests refreshed successfully!', 'success');
            }, 1500);
        },
        getRequestActions(request) {
            return [
                { label: 'View Details', action: `viewRequest(${request.id})` },
                { label: 'Edit', action: `editRequest(${request.id})` },
                { label: 'Delete', action: `deleteRequest(${request.id})` }
            ];
        },
        openNewPostModal() {
            this.openModal('newPost');
        },
        closeNewPostModal() {
            this.closeModal('newPost');
            this.newPost = { title: '', content: '' };
        },
        saveNewPost() {
            if (!this.newPost.title || !this.newPost.content) {
                this.$refs.toast.addToast('Please fill in all required fields', 'error');
                return;
            }
            
            this.loading = true;
            // Simulate API call
            setTimeout(() => {
                this.loading = false;
                this.closeNewPostModal();
                this.$refs.toast.addToast('Blog post created successfully!', 'success');
            }, 1000);
        },
        openManagePagesModal() {
            this.$refs.toast.addToast('Manage Pages feature coming soon!', 'info');
        },
        openUploadMediaModal() {
            this.$refs.toast.addToast('Upload Media feature coming soon!', 'info');
        },
        handleConfirm() {
            if (this.confirmDialog.callback) {
                this.confirmDialog.callback();
            }
            this.confirmDialog.show = false;
        },
        showConfirmDialog(title, message, callback) {
            this.confirmDialog = {
                show: true,
                title,
                message,
                callback
            };
        }
    },
    mounted() {
        // Initialize theme
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            document.body.classList.add('dark-theme');
        }
        
        // Hide loading overlay
        setTimeout(() => {
            const overlay = document.getElementById('loading-overlay');
            if (overlay) overlay.style.display = 'none';
        }, 1000);
    }
}).mount('#super-admin-app');
</script>
@endpush
@endsection

