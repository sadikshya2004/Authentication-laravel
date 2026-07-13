<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo-circle">A</div>
        <span class="sidebar-brand">Authentication</span>
    </div>

    @if(Auth::check())
        <div class="sidebar-profile">
            <div class="sidebar-avatar-wrapper">
                @if(Auth::user()->profile_image)
                    <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" 
                         alt="Profile Image" 
                         class="sidebar-avatar">
                @else
                    <div class="sidebar-avatar-placeholder">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                @endif
            </div>
            <div class="sidebar-user-name">{{ Auth::user()->name }}</div>
            <span class="badge {{ Auth::user()->role === 'admin' ? 'badge-admin' : 'badge-user' }}">
                {{ ucfirst(Auth::user()->role) }}
            </span>
        </div>

        <ul class="sidebar-menu">
            <li class="sidebar-menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="/dashboard">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="9" rx="1" />
                        <rect x="14" y="3" width="7" height="5" rx="1" />
                        <rect x="14" y="12" width="7" height="9" rx="1" />
                        <rect x="3" y="16" width="7" height="5" rx="1" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-menu-item {{ Request::is('profile*') ? 'active' : '' }}">
                <a href="{{ route('profile.show') }}">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    <span>My Profile</span>
                </a>
            </li>

            @if(Auth::user()->role === 'admin')
                <li class="sidebar-menu-item {{ Request::is('users*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        <span>User Management</span>
                    </a>
                </li>
            @endif
        </ul>

        <div class="sidebar-footer">
            <form action="/logout" method="POST" id="logoutForm">
                @csrf
                <button type="submit" class="sidebar-logout-btn">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" y1="12" x2="9" y2="12" />
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    @endif
</aside>
