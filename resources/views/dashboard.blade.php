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
          .dashboard-container{
            background:white;
            padding:40px;
            border-radius:15px;
            text-align:center;
            width:400px;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
        }

        h2{
            color:#333;
            margin-bottom:25px;
        }

        button{
            width:100%;
            padding:12px;
            border:none;
            border-radius:8px;
            background:#dc3545;
            color:white;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            background:#c82333;
            transform:translateY(-2px);
        }

        button:active{
            transform:translateY(0);
        }
        
</style>
</head>
<body>
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
    
 <script>
        document.querySelector("form").addEventListener("submit", function() {
            const btn = document.querySelector("button");
            btn.innerHTML = "Logging out...";
            btn.disabled = true;
        });
    </script>
</body>
</html>
