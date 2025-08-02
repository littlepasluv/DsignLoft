<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'DsignLoft Client')</title>            
    
    <link href="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/favicon-dsignloft-YKbl23wxwNT9WK37.png" rel="icon" type="image/png">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @stack('styles')
</head>
<body>
    <div id="app">
        <div>        
            <form-stepper></form-stepper>
        </div>
        @vite('resources/js/app.js')     
        <!-- Main Content -->
        <main class="main-container">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth-compat.js"></script>
    <script src="{{ asset('js/firebase-config.js') }}"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    @stack('scripts')
</body>
</html>

