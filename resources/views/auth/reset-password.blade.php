@extends('layouts.auth-layout')
@section('admin-layout')


<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Password <span class="tx-info">Reset</span> <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-30">The Admin Template For Perfectionist</div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email Address</label>

                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $request->email) }}" placeholder="Enter Your Email" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password">Password</label>

                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation">Confirm Password</label>

                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" required />
            </div>

            <div class="flex items-center justify-end mt-4">

                <button type="submit" class="btn btn-info btn-block">Reset Password</button>

            </div>
        </form>
    </div>
</div>
@endsection
