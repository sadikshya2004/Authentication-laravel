@extends('layouts.app')
@section('content')
<nav class="navbar">
    <!-- Left Side: Logo/Brand -->
    <a href="/dashboard" class="nav-brand">
        User Management System
    </a>

    <!-- Center/Right Side: Links -->
    <div class="nav-links">
        <a href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('profile') }}" class="{{ Request::is('profile') ? 'active' : '' }}">Profile</a>
        
        @if(Auth::user() && Auth::user()->role == 'admin')
            <a href="{{ route('users.index') }}" class="{{ Request::is('users*') ? 'active' : '' }}">User Management</a>
        @endif
    </div>

    <!-- Far Right: Logout -->
    <form action="/logout" method="POST" style="margin: 0;">
        @csrf
        <button type="submit" class="btn-logout">Logout</button>
    </form>
</nav>
@endsection