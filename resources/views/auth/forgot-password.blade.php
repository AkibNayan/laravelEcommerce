@extends('layouts.auth-layout')
@section('admin-layout')
<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

    <div class="login-wrapper password-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Forgot <span class="tx-info">Password</span> <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-30">The Admin Template For Perfectionist</div>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email Address</label>

                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Your Email" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">

                <button type="submit" class="btn btn-info btn-block">Email Password Reset Link</button>
            </div>
        </form>
    </div>
</div>
@endsection
