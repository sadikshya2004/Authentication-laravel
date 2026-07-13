@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Edit Profile</h1>
        <p class="page-subtitle">Update your personal account details</p>
    </div>
    <div class="button-group">
        <a href="{{ route('profile.show') }}" class="btn btn-secondary">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            Back to Profile
        </a>
    </div>
</div>

<div class="card" style="max-width: 800px; margin: 0 auto;">
    <h2 class="card-title">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
        </svg>
        Edit Account Details
    </h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 32px; align-items: start;">
            
            <!-- Picture upload side -->
            <div style="display: flex; flex-direction: column; align-items: center; text-align: center; gap: 16px;">
                <label class="form-label">Profile Image</label>
                <div style="position: relative;">
                    @if($user->profile_image)
                        <img src="{{ asset('storage/' . $user->profile_image) }}" 
                             alt="Profile Image" 
                             class="profile-avatar-lg" 
                             id="imagePreview">
                    @else
                        <div class="profile-avatar-placeholder-lg" id="imagePreviewContainer" style="display:flex; margin-bottom:0;">
                            <img src="" id="imagePreview" class="profile-avatar-lg" style="display:none; margin-bottom:0; outline:none; border:none;">
                            <span id="initialsText">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                        </div>
                    @endif
                </div>

                <div class="form-group" style="width: 100%;">
                    <input 
                        type="file" 
                        id="profile_image" 
                        name="profile_image" 
                        accept=".jpg,.jpeg,.png" 
                        class="form-control"
                        onchange="
                            document.getElementById('initialsText') ? document.getElementById('initialsText').style.display = 'none' : null;
                            document.getElementById('imagePreview').style.display = 'block';
                            previewProfileImage(this);
                        "
                        style="padding: 8px;">
                    <p style="font-size:12px; color:var(--text-muted); margin-top:6px;">JPG, JPEG or PNG. Max 2MB.</p>
                </div>
            </div>

            <!-- Form fields side -->
            <div>
                <div class="form-group">
                    <label class="form-label" for="name">Full Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name', $user->name) }}" 
                        class="form-control @error('name') is-invalid @enderror" 
                        required>
                    @error('name')
                        <div class="form-error">
                            <svg class="icon" style="width:14px; height:14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email', $user->email) }}" 
                        class="form-control @error('email') is-invalid @enderror" 
                        required>
                    @error('email')
                        <div class="form-error">
                            <svg class="icon" style="width:14px; height:14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="phone">Phone Number</label>
                    <input 
                        type="text" 
                        id="phone" 
                        name="phone" 
                        value="{{ old('phone', $user->phone) }}" 
                        class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')
                        <div class="form-error">
                            <svg class="icon" style="width:14px; height:14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="address">Address</label>
                    <textarea 
                        id="address" 
                        name="address" 
                        rows="4" 
                        class="form-control @error('address') is-invalid @enderror">{{ old('address', $user->address) }}</textarea>
                    @error('address')
                        <div class="form-error">
                            <svg class="icon" style="width:14px; height:14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

        </div>

        <div class="button-group" style="margin-top: 32px; border-top: 1px solid var(--border-color); padding-top: 24px; justify-content: flex-end;">
            <a href="{{ route('profile.show') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                    <polyline points="7 3 7 8 15 8"></polyline>
                </svg>
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection