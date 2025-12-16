@extends('jobssite::components.layouts.master')

@section('content')
<div class="container-fluid py-5" style="min-height: 100vh; display: flex; align-items: center; background: linear-gradient(rgba(43, 57, 64, .05), rgba(43, 57, 64, .05));">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="bg-white rounded p-5 shadow">
                    <h2 class="text-center mb-4">Change Password</h2>
                    <form id="changePasswordForm" action="{{route('password.update_user')}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" id="currentPassword" required>
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="newPassword" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="confirmPassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-3">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection