<nav class="sidebar fixed top-0 left-0 flex h-screen flex-col bg-[var(--sidebar-bg)] border-r border-[var(--border-color)] p-4 shrink-0 z-20" id="sidebar">
    <div class="flex items-center justify-between logo-container mb-6">
        <div class="flex items-center gap-3">
            <div class="size-8 text-[var(--highlight)]">
                <img
                    src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/dsign-logo-circle-YrDJzk6p2VI5LMJz.png"
                    alt="DsignLoft Icon"
                    class="logo-icon"
                />
            </div>
            <h2 class="text-[var(--text-primary)] text-xl font-bold logo-text">DsignLoft</h2>
        </div>
    </div>
    <div class="flex-grow">
        <div class="flex flex-col gap-2">
            <a class="flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium nav-link active" data-section="super-admin" href="#" @click="switchSection(\'super-admin\')"> <span class="material-icons text-xl">dashboard</span><span class="nav-text">Super Admin</span></a>
            <a class="flex items-center gap-3 rounded-md px-3 py-2 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] text-sm font-medium nav-link" data-section="content" href="#" @click="switchSection(\'content\')"> <span class="material-icons text-xl">description</span><span class="nav-text">Content</span></a>
            <a class="flex items-center gap-3 rounded-md px-3 py-2 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] text-sm font-link" data-section="users" href="#" @click="switchSection(\'users\')"> <span class="material-icons text-xl">people</span><span class="nav-text">Users</span></a>
            <a class="flex items-center gap-3 rounded-md px-3 py-2 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] text-sm font-medium nav-link" data-section="messages" href="#" @click="switchSection(\'messages\')"> <span class="material-icons text-xl">message</span><span class="nav-text">Messages</span></a>
            <a class="flex items-center gap-3 rounded-md px-3 py-2 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] text-sm font-medium nav-link" data-section="payments" href="#" @click="switchSection(\'payments\')"> <span class="material-icons text-xl">payment</span><span class="nav-text">Payments</span></a>
            <a class="flex items-center gap-3 rounded-md px-3 py-2 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] text-sm font-medium nav-link" data-section="services" href="#" @click="switchSection(\'services\')"> <span class="material-icons text-xl">design_services</span><span class="nav-text">Services</span></a>
        </div>
    </div>
    <div class="flex flex-col gap-2">
        <a class="flex items-center gap-3 rounded-md px-3 py-2 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] text-sm font-medium nav-link" href="#"> <span class="material-icons text-xl">settings</span><span class="nav-text">Settings</span></a>
        <button class="flex items-center gap-3 rounded-md px-3 py-2 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] text-sm font-medium nav-link" id="theme-toggle" @click="toggleTheme">
            <span class="material-icons text-xl theme-icon">brightness_4</span>
            <span class="nav-text">Toggle Theme</span>
        </button>
        <a class="flex items-center gap-3 rounded-md px-3 py-2 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] text-sm font-medium nav-link" href="#"> <span class="material-icons text-xl">logout</span><span class="nav-text">Log out</span></a>
    </div>
</nav>

