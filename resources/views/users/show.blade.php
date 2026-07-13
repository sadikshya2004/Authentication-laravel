@extends('layouts.app')

@section('title', 'User Details')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">User Details</h1>
        <p class="page-subtitle">Detailed account view for user listing</p>
    </div>
    <div class="button-group">
        <a href="{{ route('users.index') }}" class="btn btn-secondary">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            Back to List
        </a>
    </div>
</div>

<div class="card" style="max-width: 700px; margin: 0 auto;">
    <div style="display: flex; flex-direction: column; align-items: center; text-align: center; margin-bottom: 32px; border-bottom: 1px solid var(--border-color); padding-bottom: 24px;">
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
        
        <h2 style="margin-top: 16px; margin-bottom: 8px;">{{ $user->name }}</h2>
        <span class="badge {{ $user->role === 'admin' ? 'badge-admin' : 'badge-user' }}" style="font-size: 14px; padding: 6px 16px;">
            {{ ucfirst($user->role) }}
        </span>
    </div>

    <div class="profile-info-grid" style="grid-template-columns: 1fr 1fr; gap: 20px;">
        <div class="profile-info-item">
            <span class="profile-info-label">User ID</span>
            <span class="profile-info-value">#{{ $user->id }}</span>
        </div>

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

        <div class="profile-info-item profile-info-value-block">
            <span class="profile-info-label">Home Address</span>
            <span class="profile-info-value">{{ $user->address ?? 'Not Provided' }}</span>
        </div>

        <div class="profile-info-item">
            <span class="profile-info-label">Account Created</span>
            <span class="profile-info-value">{{ $user->created_at->format('d M Y h:i A') }}</span>
        </div>

        <div class="profile-info-item">
            <span class="profile-info-label">Last Updated</span>
            <span class="profile-info-value">{{ $user->updated_at->format('d M Y h:i A') }}</span>
        </div>
        
        @if($user->deleted_at)
            <div class="profile-info-item profile-info-value-block">
                <span class="profile-info-label" style="color: var(--danger-dark)">Soft Deleted At</span>
                <span class="profile-info-value" style="color: var(--danger)">{{ $user->deleted_at->format('d M Y h:i A') }}</span>
            </div>
        @endif
    </div>

    <div class="button-group" style="margin-top: 32px; border-top: 1px solid var(--border-color); padding-top: 24px; justify-content: flex-end;">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                <path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
            </svg>
            Edit User
        </a>
    </div>
</div>
@endsection
