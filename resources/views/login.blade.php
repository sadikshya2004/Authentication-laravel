<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:Arial, sans-serif;
    }

    body{
        background: linear-gradient(135deg, #667eea, #eb98c8);
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }

    form{
        background:white;
        padding:35px;
        border-radius:15px;
        width:380px;
        box-shadow:0 10px 25px rgba(0,0,0,0.2);
    }
    h2{
        position:absolute;
        top:130px;
        color:white;
        font-size:32px;
        font-weight:bold;
    }

    label{
        display:block;
        margin-bottom:6px;
        font-weight:bold;
        color:#333;
    }
   input[type="email"],
    input[type="password"]{
        width:100%;
        padding:12px;
        border:1px solid #ccc;
        border-radius:8px;
        font-size:15px;
        transition:0.3s;
    }

    input[type="email"]:focus,
    input[type="password"]:focus{
        outline:none;
        border-color:#667eea;
        box-shadow:0 0 8px rgba(102,126,234,0.4);
    }

    input[type="checkbox"]{
        margin-right:5px;
        cursor:pointer;
    }

    button{
        width:100%;
        padding:12px;
        border:none;
        border-radius:8px;
        background:#667eea;
        color:white;
        font-size:16px;
        font-weight:bold;
        cursor:pointer;
        transition:0.3s;
    }
    
    button:hover{
        background:#5563d6;
        transform:translateY(-2px);
    }

    button:active{
        transform:translateY(0);
    }

    input:not([type="checkbox"]) {
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:15px;
    transition:0.3s;
    }

    p{
    font-size:14px;
    }
        </style>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="/login">
        @csrf
        
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
            @error('email')
                <p style="color:red; margin: 5px 0;">{{ $message }}</p>
            @enderror
        </div>
        <br>
        
        <div>
            <label>Password:</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <p style="color:red; margin: 5px 0;">{{ $message }}</p> 
            @enderror   
        </div>
        
        <div>
            <input type="checkbox" id="show-password" onclick="togglePassword()"> 
            <label for="show-password">Show Password</label>
        </div>
        <br>
        
        <div>
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember Me</label>
        </div>
        <br>
        
        <button type="submit">Login</button>
    </form>

    <script>
        function togglePassword() {
            var x = document.getElementById("password");
            x.type = (x.type === "password") ? "text" : "password";
        }
    </script>
</body>
</html>
