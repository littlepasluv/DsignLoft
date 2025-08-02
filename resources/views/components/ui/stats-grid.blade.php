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
        <p class="text-[var(--text-primary)] text-4xl font-bold">${{ $totalRevenue ?? '125,430' }}</p>
        <p class="text-sm text-[var(--text-secondary)]">+8% from last month</p>
    </div>
    <div class="flex flex-col gap-2 rounded-lg p-6 bg-[var(--card-bg)] border border-[var(--border-color)]">
        <div class="flex items-center justify-between">
            <p class="text-[var(--text-secondary)] text-base font-medium">New Users</p>
            <span class="material-icons text-[#36a2eb]">person_add</span>
        </div>
        <p class="text-[var(--text-primary)] text-4xl font-bold">{{ $newUsers ?? '245' }}</p>
        <p class="text-sm text-[var(--text-secondary)]">+15 this week</p>
    </div>
    <div class="flex flex-col gap-2 rounded-lg p-6 bg-[var(--card-bg)] border border-[var(--border-color)]">
        <div class="flex items-center justify-between">
            <p class="text-[var(--text-secondary)] text-base font-medium">Open Tickets</p>
            <span class="material-icons text-[#ff9f40]">support_agent</span>
        </div>
        <p class="text-[var(--text-primary)] text-4xl font-bold">{{ $openTickets ?? '12' }}</p>
        <p class="text-sm text-[var(--text-secondary)]">2 high priority</p>
    </div>
</div>

