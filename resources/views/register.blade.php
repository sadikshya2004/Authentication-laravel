@extends('layouts.app')
@section('content')
<body>
    <div class="auth-container">
        <div class="auth-card">
            <h2>Sign Up</h2>
            <form method="POST" action="/register">
                @csrf

                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" placeholder="John Doe" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="name@example.com" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>

                <div class="checkbox-group">
                    <label class="checkbox-item">
                        <input type="checkbox" onclick="togglePassword()"> Show Passwords
                    </label>
                </div>

                <button type="submit" class="btn-primary">Register</button>
            </form>

            <div class="auth-footer">
                <p>Already have an account? <a href="/login">Login</a></p>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
@endsection