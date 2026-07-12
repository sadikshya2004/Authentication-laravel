@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<div class="container">

    <div class="profile-card">

        <div class="profile-header">

            @if($user->profile_image)
                <img src="{{ asset('storage/' . $user->profile_image) }}"
                     alt="Profile Image"
                     class="profile-image">
            @else
                <img src="https://via.placeholder.com/150"
                     alt="Default Profile"
                     class="profile-image">
            @endif

            <h2>{{ $user->name }}</h2>
            <p>{{ $user->role }}</p>

        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="profile-body">

            <div class="profile-row">
                <strong>Name:</strong>
                <span>{{ $user->name }}</span>
            </div>

            <div class="profile-row">
                <strong>Email:</strong>
                <span>{{ $user->email }}</span>
            </div>

            <div class="profile-row">
                <strong>Phone:</strong>
                <span>{{ $user->phone ?? 'Not Provided' }}</span>
            </div>

            <div class="profile-row">
                <strong>Address:</strong>
                <span>{{ $user->address ?? 'Not Provided' }}</span>
            </div>

            <div class="profile-row">
                <strong>Role:</strong>
                <span>{{ ucfirst($user->role) }}</span>
            </div>

            <div class="profile-row">
                <strong>Joined:</strong>
                <span>{{ $user->created_at->format('d M Y') }}</span>
            </div>

            <div class="profile-row">
                <strong>Last Updated:</strong>
                <span>{{ $user->updated_at->format('d M Y h:i A') }}</span>
            </div>

        </div>

        <div class="profile-actions">

            <a href="{{ route('profile.edit') }}" class="btn-primary">
                Edit Profile
            </a>

            <a href="{{ route('profile.password') }}" class="btn-warning">
                Change Password
            </a>

            <a href="/dashboard" class="btn-secondary">
                Dashboard
            </a>

        </div>

    </div>

</div>

@endsection