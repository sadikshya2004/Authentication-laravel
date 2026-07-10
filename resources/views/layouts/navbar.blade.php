
<nav class="navbar">
    <a href="/dashboard" class="nav-brand">User Management</a>

    <div class="nav-links">
        <a href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('profile.show') }}" class="{{ Request::is('profile*') ? 'active' : '' }}">Profile</a>
        @if(Auth::user()->role == 'admin')
            <a href="{{ route('users.index') }}">Users</a>
        @endif
    </div>

    <div class="nav-right">
        <span class="user-display-name">{{ Auth::user()->name }}</span>
        <form action="/logout" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>
</nav>
