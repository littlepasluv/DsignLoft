<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'DsignLoft Client')</title>
    
    <link href="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/favicon-dsignloft-YKbl23wxwNT9WK37.png" rel="icon" type="image/png">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/js/app.js')    
</head>
<body>
    <div id="app">
        <!-- Login Button -->
        <a href="/login" class="btn btn-primary" style="position: absolute; top: 20px; right: 20px; z-index: 10000;">Login</a>
        <!-- Loading Overlay -->
        <div id="loading-overlay" 
             style="position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(255,255,255,0.95); z-index:9999; display:flex; align-items:center; justify-content:center;">
            <p style="font-size: 18px;">Loading Dashboard...</p>
        </div>       
        <!-- Main Content -->
        <main class="main-container">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth-compat.js"></script>
    <script src="{{ asset('js/firebase-config.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    @stack('scripts')
</body>
</html>
