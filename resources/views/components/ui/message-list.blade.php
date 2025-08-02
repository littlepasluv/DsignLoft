@props(['title', 'messages', 'viewAllLink'])

<div class="bg-[var(--card-bg)] rounded-lg border border-[var(--border-color)]">
    <div class="flex justify-between items-center p-4 border-b border-[var(--border-color)]">
        <h3 class="text-xl font-bold text-[var(--text-primary)]">{{ $title }}</h3>
        @if($viewAllLink)
            <a class="text-sm font-medium text-[var(--highlight)] hover:text-[var(--highlight-hover)]" href="{{ $viewAllLink }}">Go to Inbox</a>
        @endif
    </div>
    <ul class="divide-y divide-[var(--border-color)]">
        @forelse($messages as $message)
            <li class="p-4 hover:bg-[var(--nav-hover-bg)] cursor-pointer">
                <div class="flex items-center gap-3">
                    <img alt="User Avatar" class="w-10 h-10 rounded-full" src="{{ $message['avatar'] ?? 'https://lh3.googleusercontent.com/a/ACg8ocK_sA4b-2WzQYJ2X1T_2Z1z5kG9X2m2YwU6K2G2uE=s96-c' }}"/>
                    <div>
                        <p class="text-sm font-medium text-[var(--text-primary)]">{{ $message['sender'] ?? 'Unknown Sender' }}</p>
                        <p class="text-xs text-[var(--text-secondary)] truncate w-48">{{ $message['preview'] ?? 'No message preview available' }}</p>
                    </div>
                </div>
            </li>
        @empty
            <li class="p-4 text-center text-sm text-[var(--text-secondary)]">No messages found</li>
        @endforelse
    </ul>
</div>

