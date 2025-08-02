@props(['tabs', 'activeTab'])

<div class="tabs-container">
    <div class="tabs-nav">
        @foreach($tabs as $tab)
            <button 
                class="tab-button" 
                :class="{ active: activeTab === '{{ $tab['id'] }}' }"
                @click="activeTab = '{{ $tab['id'] }}'"
            >
                {{ $tab['label'] }}
            </button>
        @endforeach
    </div>
    <div class="tabs-content">
        {{ $slot }}
    </div>
</div>

