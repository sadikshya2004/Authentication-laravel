@extends('layouts.app')
@section('content')
<body>
    <div class="auth-container">
        <div class="auth-card">
            <h2>Login</h2>
            <form method="POST" action="/login">
                @csrf
                
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required>
                    @error('email') <p class="error-text">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password" required>
                    </div>
                    @error('password') <p class="error-text">{{ $message }}</p> @enderror
                </div>

                <div class="checkbox-group">
                    <label class="checkbox-item">
                        <input type="checkbox" onclick="togglePassword()"> Show Password
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
                
                <button type="submit" class="btn-primary">Login</button>
            </form>

            <div class="auth-footer">
                <p>Create new account. <a href="/register">Sign up?</a></p>
            </div>
        </div>
    </div>
</body>
@endsection