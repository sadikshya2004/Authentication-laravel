@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

<div class="container">

    <div class="form-card">

        <h2>Edit Profile</h2>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profile.update') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>Name</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name',$user->name) }}"
                    required>

            </div>

            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email',$user->email) }}"
                    required>

            </div>

            <div class="form-group">

                <label>Phone</label>

                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone',$user->phone) }}">

            </div>

            <div class="form-group">

                <label>Address</label>

                <textarea
                    name="address"
                    rows="4">{{ old('address',$user->address) }}</textarea>

            </div>

            <div class="form-group">

                <label>Current Profile Picture</label>

                <br>

                @if($user->profile_image)

                    <img
                        src="{{ asset('storage/'.$user->profile_image) }}"
                        class="preview-image">

                @else

                    <img
                        src="https://via.placeholder.com/150"
                        class="preview-image">

                @endif

            </div>

            <div class="form-group">

                <label>Upload New Picture</label>

                <input
                    type="file"
                    name="profile_image"
                    accept=".jpg,.jpeg,.png">

            </div>

            <div class="button-group">

                <button
                    type="submit"
                    class="btn-primary">

                    Update Profile

                </button>

                <a
                    href="{{ route('profile.show') }}"
                    class="btn-secondary">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

@endsection