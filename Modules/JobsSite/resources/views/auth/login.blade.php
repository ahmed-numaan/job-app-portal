@extends('jobssite::components.layouts.master')

@section('content')
<div class="container-fluid bg-white p-0">

    <div class="container-fluid py-5" style="min-height: 100vh; display: flex; align-items: center; background: linear-gradient(rgba(43, 57, 64, .05), rgba(43, 57, 64, .05));">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="bg-white rounded p-5 shadow">
                        <h2 class="text-center mb-4">Login</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-3">Login</button>
                            <div class="text-center mt-3">
                                <a href="{{ route('password.request') }}" class="text-primary">Forgot Password?</a>
                            </div>
                            <div class="text-center mt-3">
                                Don't have an account? <a href="{{route('register')}}" class="text-primary">Sign Up</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
