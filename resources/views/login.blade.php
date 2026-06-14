<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f9;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* This container keeps everything grouped and centered */
        .login-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px; /* Limits how wide the whole form gets */
            text-align: center; /* Centers the title and button container */
        }

        /* Big Login Title at the Top */
        h2 {
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 28px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            text-align: left; /* Keeps labels and inputs aligned to the left */
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #555;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box; 
            font-size: 16px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            font-size: 14px;
            color: #666;
        }

        /* --- THE MEDIUM BUTTON STYLING --- */
        .button-container {
            display: flex;
            justify-content: center; /* Centers the button horizontally */
            margin-top: 10px;
        }

        button {
            width: 160px; /* Change this to adjust "Medium" size */
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-top: 4px;
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
