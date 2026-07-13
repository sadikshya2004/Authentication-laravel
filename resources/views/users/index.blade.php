@extends('layouts.app')

@section('title', 'User Management')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">User Management</h1>
        <p class="page-subtitle">View, search, create, edit and delete system users</p>
    </div>
    <div class="button-group">
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Create User
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

<div class="table-wrapper">
    <div class="table-controls">
        <form method="GET" action="{{ route('users.index') }}" class="search-box">
            <div class="form-control-wrapper">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control input-icon-left" 
                    placeholder="Search by name, email or role..." 
                    value="{{ request('search') }}">
                <div class="input-icon-wrapper icon-left">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $userItem)
                    <tr>
                        <td>#{{ $userItem->id }}</td>
                        <td>
                            <div class="user-cell">
                                @if($userItem->profile_image)
                                    <img src="{{ asset('storage/' . $userItem->profile_image) }}" 
                                         alt="Avatar" 
                                         class="user-avatar-sm">
                                @else
                                    <div class="user-avatar-sm-placeholder">
                                        {{ strtoupper(substr($userItem->name, 0, 1)) }}
                                    </div>
                                @endif
                                <span style="font-weight: 600;">{{ $userItem->name }}</span>
                            </div>
                        </td>
                        <td><span class="user-email-text">{{ $userItem->email }}</span></td>
                        <td>
                            <span class="badge {{ $userItem->role === 'admin' ? 'badge-admin' : 'badge-user' }}">
                                {{ $userItem->role }}
                            </span>
                        </td>
                        <td>{{ $userItem->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="action-buttons-cell">
                                <a href="{{ route('users.show', $userItem->id) }}" class="btn-action-icon" title="View details">
                                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </a>

                                <a href="{{ route('users.edit', $userItem->id) }}" class="btn-action-icon" title="Edit user">
                                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                </a>

                                @if(Auth::id() !== $userItem->id)
                                    <form action="{{ route('users.destroy', $userItem->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn-action-icon delete" title="Delete user" onclick="showDeleteModal(event, '{{ $userItem->id }}', '{{ addslashes($userItem->name) }}')">
                                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 40px; color: var(--text-muted);">
                            <svg class="icon" style="width: 48px; height: 48px; margin-bottom: 12px; stroke: var(--text-muted);" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                            <p>No users found matching your search.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-container">
        {{ $users->links() }}
    </div>
</div>

<!-- Soft Delete Confirmation Modal -->
<div class="custom-modal" id="deleteConfirmModal">
    <div class="modal-card">
        <div class="modal-header">
            <div class="modal-icon-box">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                    <line x1="12" y1="9" x2="12" y2="13"></line>
                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                </svg>
            </div>
            <h3 class="modal-title">Confirm Soft Delete</h3>
        </div>
        <div class="modal-body">
            Are you sure you want to flag user <strong id="deleteUserName"></strong> as soft-deleted? The user's account details will remain in the database but they will not be listed or allowed to authenticate.
        </div>
        <div class="modal-actions">
            <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
            <button type="button" class="btn btn-danger" onclick="confirmDelete()">Confirm Delete</button>
        </div>
    </div>
</div>
@endsection