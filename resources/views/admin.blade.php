@extends('layouts.dashboard')

@section('title', 'DsignLoft - Super Admin')

@section('dashboard-content')
<div id="super-admin-app">
    <div class="content-section active" id="super-admin-section">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 flex flex-col gap-8">
                <!-- Stats Cards -->
                <x-ui.stats-grid />
                
                <!-- Service Requests Table -->
                <x-ui.data-table 
                    title="Recent Service Requests"
                    :columns="['Service', 'Client', 'Status', 'Assigned To']"
                    :data="$serviceRequests ?? []"
                    view-all-link="#"
                />
                
                <!-- Transactions Table -->
                <x-ui.data-table 
                    title="Recent Transactions"
                    :columns="['Transaction ID', 'Client', 'Amount', 'Status', 'Date']"
                    :data="$transactions ?? []"
                    view-all-link="#"
                />
            </div>
            
            <div class="lg:col-span-1 flex flex-col gap-8">
                <!-- Quick Actions -->
                <x-ui.quick-actions />
                
                <!-- User Management -->
                <x-ui.user-list 
                    title="User Management"
                    :users="$users ?? []"
                    view-all-link="#"
                />
                
                <!-- Recent Messages -->
                <x-ui.message-list 
                    title="Recent Messages"
                    :messages="$messages ?? []"
                    view-all-link="#"
                />
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
const { createApp } = Vue;

createApp({
    data() {
        return {
            activeSection: 'super-admin',
            notifications: [],
            sidebarCollapsed: false
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

