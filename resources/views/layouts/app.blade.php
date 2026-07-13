<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Auth System')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @auth
        <div class="app-layout">
            @include('layouts.sidebar')
            <div class="sidebar-overlay" id="sidebarOverlay"></div>
            
            <div class="main-content">
                <!-- Mobile Top Header -->
                <header class="mobile-header">
                    <div class="mobile-brand">
                        <div class="sidebar-logo-circle" style="width:30px; height:30px; font-size:14px; border-radius:6px;">A</div>
                        <span>Authentication</span>
                    </div>
                    <button id="sidebarToggle" class="btn-sidebar-toggle" aria-label="Toggle Sidebar">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </button>
                </header>

                <main class="page-container">
                    @yield('content')
                </main>
            </div>
        </div>
    @else
        @yield('content')
    @endauth
</body>
</html>
