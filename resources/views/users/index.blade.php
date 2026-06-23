<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
</head>
<body>

<h2>User Management</h2>
<a href="{{ route('users.create') }}">Create User</a>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>

        <td>
            <a href="{{ route('users.show', $user->id) }}">
                View
            </a>

            <a href="{{ route('users.edit', $user->id) }}">
                Edit
            </a>

            <form action="{{ route('users.destroy', $user->id) }}"
                  method="POST"
                  style="display:inline;">
                @csrf
                @method('DELETE')

                <button type="submit">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

<br>

{{ $users->links() }}

</body>
</html>