<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navbar')

    <main class="page-content">
        <div class="container">
            <!-- Sketch: "Welcome back, Name!" -->
            <h2 class="welcome-text">Welcome back, {{ $user->name }}!</h2>

            <div class="profile-grid">
                
                <!-- LEFT COLUMN: Profile Info Card -->
                <div class="profile-main-card">
                    <div class="profile-header">
                        <div class="avatar-circle">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div class="profile-title">
                            <h3>{{ $user->name }}</h3>
                            <span class="role-badge {{ $user->role }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </div>
                    </div>

                    <div class="profile-info-list">
                        <div class="info-item">
                            <span class="info-label">Name</span>
                            <span class="info-value">{{ $user->name }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Email</span>
                            <span class="info-value">{{ $user->email }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Role</span>
                            <span class="info-value">{{ ucfirst($user->role) }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Member since</span>
                            <span class="info-value">{{ $user->created_at->format('F Y') }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Last updated</span>
                            <span class="info-value">{{ $user->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: Quick Actions Card -->
                <div class="profile-actions-card">
                    <h4>Quick Actions</h4>
                    <div class="action-list">
                        <a href="{{ route('profile.edit') }}" class="action-link-item">
                            <span>Edit profile</span>
                            <span class="arrow-icon">→</span>
                        </a>
                        
                        <a href="#" class="action-link-item">
                            <span>Change password</span>
                            <span class="arrow-icon">→</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </main>
</body>
</html>