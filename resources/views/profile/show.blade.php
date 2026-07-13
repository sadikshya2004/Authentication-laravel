@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Profile Overview</h1>
        <p class="page-subtitle">Manage your personal information and credentials</p>
    </div>
    <div class="button-group">
        <a href="/dashboard" class="btn btn-secondary">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="7" height="9" rx="1" />
                <rect x="14" y="3" width="7" height="5" rx="1" />
                <rect x="14" y="12" width="7" height="9" rx="1" />
                <rect x="3" y="16" width="7" height="5" rx="1" />
            </svg>
            Dashboard
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
        <div>{{ session('success') }}</div>
    </div>
@endif

<div class="profile-grid">
    <!-- Left Column - Avatar Card -->
    <div class="card profile-card-left">
        <div class="profile-avatar-wrapper">
            @if($user->profile_image)
                <img src="{{ asset('storage/' . $user->profile_image) }}" 
                     alt="Profile Image" 
                     class="profile-avatar-lg">
            @else
                <div class="profile-avatar-placeholder-lg">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif
        </div>
        
        <h2 class="profile-name-title">{{ $user->name }}</h2>
        <span class="badge {{ $user->role === 'admin' ? 'badge-admin' : 'badge-user' }}" style="margin-bottom: 24px; font-size: 14px; padding: 6px 16px;">
            {{ ucfirst($user->role) }} Account
        </span>

        <div class="button-group btn-block" style="flex-direction: column; width: 100%; gap: 12px;">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-block">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
                Edit Profile
            </a>
            
            <a href="{{ route('profile.password') }}" class="btn btn-secondary btn-block">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                Change Password
            </a>
        </div>
    </div>

    <!-- Right Column - Details Card -->
    <div class="card" style="padding: 32px;">
        <h3 class="card-title" style="margin-bottom: 28px; border-bottom: 1px solid var(--border-color); padding-bottom: 12px;">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
                <polyline points="10 9 9 9 8 9"></polyline>
            </svg>
            Personal Information
        </h3>

        <div class="profile-info-grid">
            <div class="profile-info-item">
                <span class="profile-info-label">Full Name</span>
                <span class="profile-info-value">{{ $user->name }}</span>
            </div>

            <div class="profile-info-item">
                <span class="profile-info-label">Email Address</span>
                <span class="profile-info-value">{{ $user->email }}</span>
            </div>

            <div class="profile-info-item">
                <span class="profile-info-label">Phone Number</span>
                <span class="profile-info-value">{{ $user->phone ?? 'Not Provided' }}</span>
            </div>

            <div class="profile-info-item">
                <span class="profile-info-label">Role / Rank</span>
                <span class="profile-info-value">{{ ucfirst($user->role) }}</span>
            </div>

            <div class="profile-info-item profile-info-value-block">
                <span class="profile-info-label">Home Address</span>
                <span class="profile-info-value">{{ $user->address ?? 'Not Provided' }}</span>
            </div>

            <div class="profile-info-item">
                <span class="profile-info-label">Member Since</span>
                <span class="profile-info-value">{{ $user->created_at->format('d M Y') }}</span>
            </div>

            <div class="profile-info-item">
                <span class="profile-info-label">Last Updated</span>
                <span class="profile-info-value">{{ $user->updated_at->format('d M Y h:i A') }}</span>
            </div>
        </div>
    </div>
</div>
@endsection