@extends('layouts.auth-layout')
@section('admin-layout')

<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Admin <span class="tx-info">Register</span> <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-20">The Admin Template For Perfectionist</div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Full Name" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Enter Your Email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Enter Your Password" name="password" required autocomplete="new-password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
            </div>

            <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
            <button type="submit" class="btn btn-info btn-block">Register</button>
        </form>

        <div class="mg-t-10 tx-center">Already registered? <a href="{{ route('login') }}" class="tx-info">Log In</a></div>
    </div><!-- login-wrapper -->
</div><!-- d-flex -->

@endsection
