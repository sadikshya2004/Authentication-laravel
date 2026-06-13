<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
