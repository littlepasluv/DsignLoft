<header class="sticky top-0 z-10 flex items-center justify-between whitespace-nowrap border-b border-solid border-[var(--border-color)] bg-[var(--sidebar-bg)] px-8 py-4">
    <div class="flex items-center gap-4">
        <button class="flex items-center justify-center rounded-full size-10 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)] transition-transform duration-300 ease-in-out" id="nav-toggle-btn" @click="toggleSidebar">
            <span class="material-icons text-2xl">chevron_left</span>
        </button>
        <h1 class="text-2xl font-bold text-[var(--text-primary)]" id="header-title">{{ $title ?? 'Dashboard' }}</h1>
    </div>
    <div class="flex items-center gap-4">
        <div class="flex items-center gap-3">
            <div class="text-sm text-right">
                <p class="font-semibold text-[var(--text-primary)]">{{ $userName ?? 'User' }}</p>
                <p class="text-[var(--text-secondary)]">{{ $userRole ?? 'User' }}</p>
            </div>
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" style='background-image: url("{{ $userAvatar ?? 'https://assets.zyrosite.com/YleqxM2lNkfl3kLp/littlepasluv-AzG353jnK5T6Le67.jpg' }}");'></div>
        </div>
        <button class="flex items-center justify-center rounded-full size-10 text-[var(--text-secondary)] hover:bg-[var(--nav-hover-bg)] hover:text-[var(--text-primary)]"> <span class="material-icons text-2xl">notifications</span> </button>
    </div>
</header>

