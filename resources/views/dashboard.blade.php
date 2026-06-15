<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <div class="dashboard-container">
    <h2>Welcome, {{ $user->name }}</h2>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
</body>
</html>
