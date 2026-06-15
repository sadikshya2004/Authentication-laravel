<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg, #667eea, #764ba2);
        }
        
</style>
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
