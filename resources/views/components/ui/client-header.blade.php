<header class="header">
    <div class="header-content-grid">
        <div class="header-top-row">
            <div class="logo">
                <img src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/logo_dsignloft-Y4LxQ4REjXhxO2a5.svg" alt="DsignLoft Logo" style="width: 180px;">
            </div>
            <div class="user-section">
                <div class="user-name" id="headerUserName" @click="toggleUserDropdown">{{ $userName ?? 'User' }}</div>
                <div class="profile-photo" id="headerProfilePhoto" @click="toggleUserDropdown"></div>
                <div class="user-dropdown" id="userDropdown" :class="{ active: userDropdownOpen }">
                    <div class="dropdown-item" @click="signOut">Sign Out</div>
                </div>
            </div>
        </div>
        <div class="header-bottom-row">
            <div class="project-title-container">
                <h2 id="projectTitle">{{ $projectTitle ?? 'Your Project Dashboard' }}</h2>
            </div>
            <div class="nav-tabs">
                <div class="nav-tab" :class="{ active: activeTab === 'brief' }" @click="switchTab('brief')">Brief</div>
                <div class="nav-tab" :class="{ active: activeTab === 'files' }" @click="switchTab('files')">Files</div>
                <div class="nav-tab" :class="{ active: activeTab === 'messages' }" @click="switchTab('messages')">Messages</div>
                <div class="nav-tab" :class="{ active: activeTab === 'payment' }" @click="switchTab('payment')">Payments</div>
            </div>
        </div>
    </div>
</header>

