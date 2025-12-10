@extends('jobssite::components.layouts.master')

@section('content')
<div class="container-fluid py-5" style="min-height: 100vh; display: flex; align-items: center; background: linear-gradient(rgba(43, 57, 64, .05), rgba(43, 57, 64, .05));">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="bg-white rounded p-5 shadow">
                    <h2 class="text-center mb-4">{{ __('Reset Password') }}</h2>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-3">Send Password Reset Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
