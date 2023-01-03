@extends('backend.layout.template')

@section('body-content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Update Order Status</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>
<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Order Table</h6>
        <div class="bd-gray-300 rounded">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('order.update', $orderDetails->id) }}" method="POST">
                        @csrf
                        <div class="row">


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" value="{{ $orderDetails->cus_name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" value="{{ $orderDetails->last_name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" value="{{ $orderDetails->email }}" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{ $orderDetails->phone }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Shipping Address</label>
                                    <input type="text" name="address" value="{{ $orderDetails->address }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark text-2">Division</label>
                                    <select class="form-control" name="division_id">

                                        <option>Please Select a Division</option>
                                        @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}" @if($division->id == $orderDetails->division_id) selected @endif >{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark text-2">District</label>
                                    <select class="form-control" name="district_id">
                                        <option>Please Select a District</option>
                                        @foreach ($districts as $district)
                                        <option value="{{ $district->id }}" @if($district->id == $orderDetails->district_id) selected @endif >{{ $district->district_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input type="text" name="post_code" value="{{ $orderDetails->post_code }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Admin Note</label>
                                    <textarea name="admin_note" class="form-control" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Update Order Status</label>
                                    <select name="status" class="form-control">
                                        <option>Please Update The Order Status</option>
                                        <option value="0" @if($orderDetails->status == 0) selected @endif>In Processing</option>
                                        <option value="1" @if($orderDetails->status == 1) selected @endif>On Hold</option>
                                        <option value="2" @if($orderDetails->status == 2) selected @endif>Successfully Delivered</option>
                                        <option value="3" @if($orderDetails->status == 3) selected @endif>Canceled</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="updateId" value="{{ $orderDetails->id }}">
                                    <input type="submit" name="updateOrder" value="Update Order Information" class="btn btn-teal btn-block mg-b-10">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
