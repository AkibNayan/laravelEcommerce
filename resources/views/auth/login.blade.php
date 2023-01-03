@extends('layouts.auth-layout')
@section('admin-layout')


<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Admin <span class="tx-info">Login</span> <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-30">The Admin Template For Perfectionist</div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Password" required autocomplete="current-password">

                <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot your password?</a>
            </div>
            <button type="submit" class="btn btn-info btn-block">Log In</button>
        </form>

        <div class="mg-t-30 tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info">Sign Up</a></div>
    </div><!-- login-wrapper -->
</div><!-- d-flex -->

@endsection
