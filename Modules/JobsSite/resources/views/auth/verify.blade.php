@extends('jobssite::components.layouts.master')

@section('content')
<div class="container-fluid bg-white p-0">

    <div class="container-fluid py-5" style="min-height: 100vh; display: flex; align-items: center; background: linear-gradient(rgba(43, 57, 64, .05), rgba(43, 57, 64, .05));">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="bg-white rounded p-5 shadow">
                        <h2 class="text-center mb-4">{{ __('Verify Your Email Address') }}</h2>
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100 py-3">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection