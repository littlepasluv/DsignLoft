@props(['tabs', 'activeTab' => 'activeTab'])

<div class="vue-tabs">
    <div class="tabs-nav">
        @foreach($tabs as $tab)
            <button 
                class="tab-button" 
                :class="{ active: {{ $activeTab }} === '{{ $tab['id'] }}' }"
                @click="{{ $activeTab }} = '{{ $tab['id'] }}'"
            >
                @if(isset($tab['icon']))
                    <i class="{{ $tab['icon'] }}"></i>
                @endif
                {{ $tab['label'] }}
            </button>
        @endforeach
    </div>
    <div class="tabs-content">
        {{ $slot }}
    </div>
</div>

<style>
.vue-tabs {
    width: 100%;
}

.tabs-nav {
    display: flex;
    border-bottom: 2px solid #e9ecef;
    margin-bottom: 1rem;
}

.tab-button {
    background: none;
    border: none;
    padding: 0.75rem 1.5rem;
    cursor: pointer;
    font-size: 0.875rem;
    font-weight: 500;
    color: #6c757d;
    border-bottom: 2px solid transparent;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.tab-button:hover {
    color: #495057;
    background-color: #f8f9fa;
}

.tab-button.active {
    color: #007bff;
    border-bottom-color: #007bff;
    background-color: #f8f9fa;
}

.tabs-content {
    min-height: 200px;
}
</style>

