@extends('frontend.layout.template')

@section('body-content')
<div role="main" class="main shop py-4">

    <div class="container">

        <div class="row">
            <div class="col">

                <div class="featured-boxes">
                    <div class="row">
                        <div class="col">
                            <div class="featured-box featured-box-primary text-left mt-2">
                                <div class="box-content">
                                    <!-- Profile Page Content Area Start -->
                                    <div class="row">
                                        <div class="col-lg-3">
                                            @if ( !empty(Auth::user()->image) )
                                            <img src="{{ asset('backend/img/users/') }}/{{ Auth::user()->image }}" alt="User Image" class="img-fluid">
                                            @else
                                            <img src="{{ asset('backend/img/users/avatar.png') }}" alt="User Image" class="img-fluid">
                                            @endif
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <table class="table table-bordered table-hover table-striped">
                                                        <tbody>
                                                            <tr scope="col">
                                                                <th>Name</th>
                                                                <th>{{ Auth::user()->name }}</th>
                                                            </tr>
                                                            <tr scope="col">
                                                                <th>Email</th>
                                                                <th>{{ Auth::user()->email }}</th>
                                                            </tr>
                                                            <tr scope="col">
                                                                <th>Phone</th>
                                                                <th>
                                                                    @if (!is_null(Auth::user()->phone))
                                                                    {{ Auth::user()->phone }}
                                                                    @else
                                                                    - N/A -
                                                                    @endif
                                                                </th>
                                                            </tr>
                                                            <tr scope="col">
                                                                <th>Shipping Address</th>
                                                                <th>
                                                                    @if (!is_null(Auth::user()->address))
                                                                    {{ Auth::user()->address }}
                                                                    @else
                                                                    - N/A -
                                                                    @endif
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-lg-6">
                                                    <table class="table table-bordered table-hover table-striped">
                                                        <tbody>
                                                            <tr scope="col">
                                                                <th>City</th>
                                                                <th>
                                                                    @if (!is_null(Auth::user()->city))
                                                                    {{ Auth::user()->city }}
                                                                    @else
                                                                    - N/A -
                                                                    @endif
                                                                </th>
                                                            </tr>
                                                            <tr scope="col">
                                                                <th>Country</th>
                                                                <th>
                                                                    @if (!is_null(Auth::user()->country))
                                                                    {{ Auth::user()->country }}
                                                                    @else
                                                                    - N/A -
                                                                    @endif
                                                                </th>
                                                            </tr>
                                                            <tr scope="col">
                                                                <th>Zip</th>
                                                                <th>
                                                                    @if (!is_null(Auth::user()->zipcode))
                                                                    {{ Auth::user()->zipcode }}
                                                                    @else
                                                                    - N/A -
                                                                    @endif
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 text-right">
                                                    <a href="{{ route('profile.edit', Auth::user()->id ) }}" class="btn btn-primary">Update Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Profile Page Content Area End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
