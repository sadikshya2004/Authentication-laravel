<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    @include('layouts.navbar')
    <div class = "page-content">
    <div class="dashboard-container">
    <h2>Welcome, {{ $user->name }}</h2>
    <hr style="margin:15px 0;">

    <h3>Dashboard Statistics</h3>

    <p>Total Users: {{ $totalUsers }}</p>
    <p>Admin Users: {{ $adminUsers }}</p>
    <p>Regular Users: {{ $regularUsers }}</p>
    <p>Users Registered This Month: {{ $monthlyUsers }}</p>

    <br>

    @if(Auth::user()->role == 'admin')
        <a href="{{ route('users.index') }}">
            User Management
        </a>
        <br><br>
    @endif

     <a href="{{ route('profile') }}">
        Profile
    </a> 

    <br><br>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>

</div>
</div>
    
 <script>
        document.querySelector("form").addEventListener("submit", function() {
            const btn = document.querySelector("button");
            btn.innerHTML = "Logging out...";
            btn.disabled = true;
        });
    </script>
</body>
</html>
