@extends('layouts.app')

@section('content')
<div id="loading-overlay" 
     style="position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(255,255,255,0.95); z-index:9999; display:flex; align-items:center; justify-content:center;">
    <p style="font-size: 18px;">Loading Dashboard...</p>
</div>

<div class="relative flex size-full min-h-screen flex-row group/design-root" style='font-family: Inter, "Noto Sans", sans-serif;'>
    <!-- Sidebar -->
    <x-ui.sidebar />
    
    <!-- Main Content -->
    <div class="flex flex-1 flex-col main-content" id="main-content">
        <!-- Header -->
        <x-ui.header />
        
        <!-- Main Content Area -->
        <main class="flex-1 bg-[var(--main-bg)] p-8">
            @yield('dashboard-content')
        </main>
    </div>
</div>
@endsection

