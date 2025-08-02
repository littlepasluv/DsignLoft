@props(['title', 'columns', 'data', 'viewAllLink'])

<div class="bg-[var(--card-bg)] rounded-lg border border-[var(--border-color)]">
    <div class="flex justify-between items-center p-4 border-b border-[var(--border-color)]">
        <h2 class="text-xl font-bold text-[var(--text-primary)]">{{ $title }}</h2>
        @if($viewAllLink)
            <a class="text-sm font-medium text-[var(--highlight)] hover:text-[var(--highlight-hover)]" href="{{ $viewAllLink }}">View All</a>
        @endif
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-[var(--sidebar-bg)]">
                <tr>
                    @foreach($columns as $column)
                        <th class="px-6 py-3 text-sm font-semibold text-[var(--text-secondary)] uppercase tracking-wider">{{ $column }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="divide-y divide-[var(--border-color)]">
                @forelse($data as $row)
                    <tr>
                        @foreach($row as $cell)
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-secondary)]">
                                @if(is_array($cell) && isset($cell['type']) && $cell['type'] === 'badge')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium badge-{{ $cell['status'] }}">{{ $cell['text'] }}</span>
                                @else
                                    {{ $cell }}
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($columns) }}" class="px-6 py-4 text-center text-sm text-[var(--text-secondary)]">No data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

