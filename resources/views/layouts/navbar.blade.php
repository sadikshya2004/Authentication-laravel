<nav class="navbar">

    <div class="logo">
        User Management System
    </div>

    <div class="nav-links">

        <a href="/dashboard">Dashboard</a>

        @if(Auth::user()->role == 'admin')
            <a href="/users">User Management</a>
        @endif

        <a href="/profile">Profile</a>

    </div>

    <div class="nav-actions">

        <span class="welcome">
            {{ Auth::user()->name }}
        </span>

        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                Logout
            </button>
        </form>

    </div>

</nav>