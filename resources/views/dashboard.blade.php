@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Welcome back, {{ Auth::user()->name }}!</h1>
        <p class="page-subtitle">
            @if(Auth::user()->role === 'admin')
                System overview and administration controls
            @else
                Overview of your personal profile and account credentials
            @endif
        </p>
    </div>
    <div>
        <span class="badge {{ Auth::user()->role === 'admin' ? 'badge-admin' : 'badge-user' }}" style="font-size: 14px; padding: 6px 16px;">
            {{ ucfirst(Auth::user()->role) }} Session
        </span>
    </div>
</div>

@if(Auth::user()->role === 'admin')
    <div class="stats-grid">
        <!-- Card 1: Total Users -->
        <div class="stat-card">
            <div class="stat-card-left">
                <span class="stat-label">Total Users</span>
                <span class="stat-value">{{ $totalUsers }}</span>
            </div>
            <div class="stat-icon-box stat-indigo">
                <svg class="icon" style="width:28px; height:28px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
            </div>
        </div>

        <!-- Card 2: Admin Users -->
        <div class="stat-card">
            <div class="stat-card-left">
                <span class="stat-label">Admin Users</span>
                <span class="stat-value">{{ $adminUsers }}</span>
            </div>
            <div class="stat-icon-box stat-blue">
                <svg class="icon" style="width:28px; height:28px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                </svg>
            </div>
        </div>

        <!-- Card 3: Regular Users -->
        <div class="stat-card">
            <div class="stat-card-left">
                <span class="stat-label">Regular Users</span>
                <span class="stat-value">{{ $regularUsers }}</span>
            </div>
            <div class="stat-icon-box stat-emerald">
                <svg class="icon" style="width:28px; height:28px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                </svg>
            </div>
        </div>

        <!-- Card 4: Monthly Registrations -->
        <div class="stat-card">
            <div class="stat-card-left">
                <span class="stat-label">Registered This Month</span>
                <span class="stat-value">{{ $monthlyUsers }}</span>
            </div>
            <div class="stat-icon-box stat-amber">
                <svg class="icon" style="width:28px; height:28px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
            </div>
        </div>
    </div>
@endif

<div class="card" style="padding: 32px;">
    <h2 class="card-title" style="margin-bottom: 24px;">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
        </svg>
        Quick Account Actions
    </h2>
    
    <div style="display: flex; gap: 16px; flex-wrap: wrap;">
        @if(Auth::user()->role === 'admin')
            <a href="{{ route('users.index') }}" class="btn btn-primary" style="padding: 14px 28px;">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                Manage System Users
            </a>
        @endif

        <a href="{{ route('profile.show') }}" class="btn btn-secondary" style="padding: 14px 28px;">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            View My Profile Card
        </a>
    </div>
</div>
@endsection