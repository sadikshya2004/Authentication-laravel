<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>

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
            background:linear-gradient(135deg,#667eea,#764ba2);
        }

        .profile-container{
            background:white;
            width:600px;
            padding:40px;
            border-radius:15px;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        label{
            display:block;
            margin-top:15px;
            font-weight:bold;
        }

        input{
            width:100%;
            padding:12px;
            margin-top:5px;
            border:1px solid #ccc;
            border-radius:8px;
        }

        button{
            width:100%;
            padding:12px;
            margin-top:20px;
            border:none;
            border-radius:8px;
            background:#667eea;
            color:white;
            font-size:16px;
            cursor:pointer;
        }

        button:hover{
            background:#5563d6;
        }

        .success{
            color:green;
            text-align:center;
            margin-bottom:15px;
        }

        .error{
            color:red;
            font-size:14px;
        }

        a{
            display:block;
            text-align:center;
            margin-top:20px;
        }
    </style>
</head>
<body>
@include('layouts.navbar')
<div class="profile-container">

    <h2>My Profile</h2>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <label>Name</label>
        <input type="text"
               name="name"
               value="{{ old('name', $user->name) }}">

        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Email</label>
        <input type="email"
               name="email"
               value="{{ old('email', $user->email) }}">

        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">
            Update Profile
        </button>
    </form>

    <a href="/dashboard">
        Back to Dashboard
    </a>

</div>

</body>
</html>