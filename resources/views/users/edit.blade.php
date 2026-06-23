<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf
    @method('PUT')

    <div>
        <label>Name</label><br>
        <input type="text"
               name="name"
               value="{{ old('name', $user->name) }}">

        @error('name')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label>Email</label><br>
        <input type="email"
               name="email"
               value="{{ old('email', $user->email) }}">

        @error('email')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label>Role</label><br>

        <select name="role">

            <option value="admin"
                {{ $user->role == 'admin' ? 'selected' : '' }}>
                Admin
            </option>

            <option value="user"
                {{ $user->role == 'user' ? 'selected' : '' }}>
                User
            </option>

        </select>

        @error('role')
            <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <button type="submit">
        Update User
    </button>

</form>

<br>

<a href="{{ route('users.index') }}">
    Back
</a>

</body>
</html>