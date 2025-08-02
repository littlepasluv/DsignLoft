@props(['id', 'label', 'items'])

<div class="vue-dropdown" :class="{ open: {{ $id }}Open }">
    <button 
        type="button" 
        class="dropdown-toggle"
        @click="{{ $id }}Open = !{{ $id }}Open"
        @blur="closeDropdown('{{ $id }}')"
    >
        {{ $label }}
        <i class="dropdown-arrow" :class="{ rotated: {{ $id }}Open }">▼</i>
    </button>
    
    <div class="dropdown-menu" v-show="{{ $id }}Open">
        @foreach($items as $item)
            <a 
                href="{{ $item['url'] ?? '#' }}" 
                class="dropdown-item"
                @click="{{ $item['action'] ?? '' }}"
            >
                @if(isset($item['icon']))
                    <i class="{{ $item['icon'] }}"></i>
                @endif
                {{ $item['label'] }}
            </a>
        @endforeach
    </div>
</div>

<style>
.vue-dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-toggle {
    background: white;
    border: 1px solid #ced4da;
    border-radius: 0.375rem;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.2s ease;
}

.dropdown-toggle:hover {
    border-color: #adb5bd;
}

.dropdown-toggle:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.dropdown-arrow {
    font-size: 0.75rem;
    transition: transform 0.2s ease;
}

.dropdown-arrow.rotated {
    transform: rotate(180deg);
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    min-width: 160px;
    background: white;
    border: 1px solid #ced4da;
    border-radius: 0.375rem;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    z-index: 1000;
    margin-top: 0.125rem;
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    color: #212529;
    text-decoration: none;
    font-size: 0.875rem;
    transition: background-color 0.2s ease;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
    color: #16181b;
}

.dropdown-item:first-child {
    border-top-left-radius: 0.375rem;
    border-top-right-radius: 0.375rem;
}

.dropdown-item:last-child {
    border-bottom-left-radius: 0.375rem;
    border-bottom-right-radius: 0.375rem;
}
</style>

