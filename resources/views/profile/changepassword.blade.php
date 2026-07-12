@extends('layouts.app')

@section('title', 'Change Password')

@section('content')

<div class="container">

    <div class="form-card">

        <h2>Change Password</h2>

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

        <form action="{{ route('profile.password.update') }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>Current Password</label>

                <input
                    type="password"
                    name="current_password"
                    required>

            </div>

            <div class="form-group">

                <label>New Password</label>

                <input
                    type="password"
                    name="new_password"
                    required>

            </div>

            <div class="form-group">

                <label>Confirm Password</label>

                <input
                    type="password"
                    name="new_password_confirmation"
                    required>

            </div>

            <div class="button-group">

                <button
                    type="submit"
                    class="btn-primary">

                    Change Password

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