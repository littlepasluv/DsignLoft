@props(['id', 'title', 'size' => 'md'])

<div id="{{ $id }}" class="modal" :class="{ active: {{ $id }}Open }" @click.self="{{ $id }}Open = false">
    <div class="modal-content modal-{{ $size }}">
        <div class="modal-header">
            <h3 class="modal-title">{{ $title }}</h3>
            <button class="modal-close" @click="{{ $id }}Open = false">&times;</button>
        </div>
        <div class="modal-body">
            {{ $slot }}
        </div>
        <div class="modal-footer">
            {{ $footer ?? '' }}
        </div>
    </div>
</div>

