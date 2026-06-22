<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>

<h2>Create User</h2>

<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <div>
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}">

        @error('name')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}">

        @error('email')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label>Password</label><br>
        <input type="password" name="password">

        @error('password')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label>Confirm Password</label><br>
        <input type="password" name="password_confirmation">
    </div>

    <br>

    <div>
        <label>Role</label><br>

        <select name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>

        @error('role')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <button type="submit">
        Create User
    </button>

</form>

<br>

<a href="{{ route('users.index') }}">
    Back to User List
</a>

</body>
</html>