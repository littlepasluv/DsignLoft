@props(['title', 'users', 'viewAllLink'])

<div class="bg-[var(--card-bg)] rounded-lg border border-[var(--border-color)]">
    <div class="flex justify-between items-center p-4 border-b border-[var(--border-color)]">
        <h3 class="text-xl font-bold text-[var(--text-primary)]">{{ $title }}</h3>
        @if($viewAllLink)
            <a class="text-sm font-medium text-[var(--highlight)] hover:text-[var(--highlight-hover)]" href="{{ $viewAllLink }}">All Users</a>
        @endif
    </div>
    <ul class="divide-y divide-[var(--border-color)]">
        @forelse($users as $user)
            <li class="p-4 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <img alt="User Avatar" class="w-10 h-10 rounded-full" src="{{ $user['avatar'] ?? 'https://lh3.googleusercontent.com/a/ACg8ocJdC-4O-3oPz_w_dD8-2Jgq2Yc7aPq9oK3n4z7H2Q=s96-c' }}"/>
                    <div>
                        <p class="text-sm font-medium text-[var(--text-primary)]">{{ $user['name'] ?? 'Unknown User' }}</p>
                        <p class="text-xs text-[var(--text-secondary)]">{{ $user['role'] ?? 'User' }}</p>
                    </div>
                </div>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-{{ $user['status'] ?? 'active' }}">{{ ucfirst($user['status'] ?? 'Active') }}</span>
            </li>
        @empty
            <li class="p-4 text-center text-sm text-[var(--text-secondary)]">No users found</li>
        @endforelse
    </ul>
</div>

