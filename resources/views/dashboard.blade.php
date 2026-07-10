@extends('layouts.app')
@section('content') 
@include('layouts.navbar')
    <main class="page-content">
        <div class="container">
            <!-- Header Section -->
            <div class="dashboard-header">
                <div>
                    <h2>Welcome, {{ Auth::user()->name }}</h2>
                    <p style="color: var(--text-light);">
                        @if(Auth::user()->role == 'admin')
                            System overview and management dashboard.
                        @else
                            Welcome to your personal account dashboard.
                        @endif
                    </p>
                </div>
                <span class="role-badge {{ Auth::user()->role }}">
                    {{ ucfirst(Auth::user()->role) }} Account
                </span>
            </div>

            <hr class="divider">

            <!-- Statistics Grid (ONLY VISIBLE TO ADMIN) -->
            @if(Auth::user()->role == 'admin')
                <div class="admin-section">
                    <h3 style="margin-bottom: 20px;">System Statistics</h3>
                    <div class="stats-grid">
                        <div class="stat-card">
                            <p class="stat-label">Total Users</p>
                            <p class="stat-value">{{ $totalUsers }}</p>
                        </div>

                        <div class="stat-card">
                            <p class="stat-label">Admin Users</p>
                            <p class="stat-value">{{ $adminUsers }}</p>
                        </div>

                        <div class="stat-card">
                            <p class="stat-label">Regular Users</p>
                            <p class="stat-value">{{ $regularUsers }}</p>
                        </div>

                        <div class="stat-card">
                            <p class="stat-label">Registered This Month</p>
                            <p class="stat-value">{{ $monthlyUsers }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Action Section (Visible to everyone) -->
            <div class="action-section">
                <h3>Quick Actions</h3>
                <div class="action-buttons">
                    
                    <!-- Only Admin can see this button -->
                    @if(Auth::user()->role == 'admin')
                        <a href="{{ route('users.index') }}" class="btn-action btn-admin">
                            Manage User List
                        </a>
                    @endif

                    <!-- Both can see their own profile -->
                    <a href="{{ route('profile.show') }}" class="btn-action btn-profile">
                        View My Profile
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection