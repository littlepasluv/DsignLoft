@extends('layouts.app')

@section('title', 'DsignLoft Client')

@section('content')
<div id="client-app">
    <div id="loading-overlay" style="position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(255,255,255,0.95); z-index:9999; display:flex; align-items:center; justify-content:center;">
        <p style="font-size: 18px;">Loading Dashboard...</p>
    </div>

    <!-- Header -->
    <x-ui.client-header />

    <!-- Main Content -->
    <main class="main-container">
        <!-- Brief Tab -->
        <div class="tab-content" :class="{ active: activeTab === 'brief' }" id="brief-tab">
            <x-ui.info-bar>
                100% money back guarantee. 
                <a href="https://dsignloft.com/dsignloft-refund-policy" target="_blank" rel="noopener noreferrer" style="color: #53AB81; text-decoration: underline;">
                    Read our Terms and Conditions.
                </a>
            </x-ui.info-bar>
            
            <x-ui.brief-container />
            
            <div class="button-group">
                <a href="#" class="btn btn-secondary" id="editBriefBtn">Edit Brief</a>
                <button class="btn btn-primary" @click="switchTab('payment')">Proceed to Payments</button>
            </div>
        </div>

        <!-- Files Tab -->
        <div class="tab-content" :class="{ active: activeTab === 'files' }" id="files-tab">
            <x-ui.info-bar>You will receive design drafts shortly after payment is complete.</x-ui.info-bar>
            <x-ui.files-container />
        </div>

        <!-- Messages Tab -->
        <div class="tab-content" :class="{ active: activeTab === 'messages' }" id="messages-tab">
            <x-ui.messages-container />
        </div>

        <!-- Payment Tab -->
        <div class="tab-content" :class="{ active: activeTab === 'payment' }" id="payment-tab-content">
            <x-ui.payment-container />
        </div>
    </main>
</div>

@push('scripts')
<script>
const { createApp } = Vue;

createApp({
    data() {
        return {
            activeTab: 'brief',
            projectData: null,
            userDropdownOpen: false
        }
    },
    methods: {
        switchTab(tab) {
            this.activeTab = tab;
            // Update URL hash if needed
            window.location.hash = tab;
        },
        toggleUserDropdown() {
            this.userDropdownOpen = !this.userDropdownOpen;
        },
        signOut() {
            // Firebase sign out logic
            firebase.auth().signOut().then(() => {
                window.location.href = '/login';
            });
        },
        loadProjectData() {
            // Load project data from API or Firebase
            // This would be implemented based on your data source
        }
    },
    mounted() {
        // Initialize from URL hash
        const hash = window.location.hash.substring(1);
        if (hash && ['brief', 'files', 'messages', 'payment'].includes(hash)) {
            this.activeTab = hash;
        }
        
        // Load project data
        this.loadProjectData();
        
        // Hide loading overlay
        setTimeout(() => {
            const overlay = document.getElementById('loading-overlay');
            if (overlay) overlay.style.display = 'none';
        }, 1000);
    }
}).mount('#client-app');
</script>
@endpush
@endsection

