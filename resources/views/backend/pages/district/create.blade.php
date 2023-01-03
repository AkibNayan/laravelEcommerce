@extends('backend.layout.template')

@section('body-content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Create New District</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>
<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Create New District</h6>
        <form action="{{ route('district.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>District Name</label>
                <input type="text" name="district_name" required="required" autocomplete="off" placeholder="Enter District Name" class="form-control">
            </div>

            <div class="form-group">
                <label>Division Name</label>
                <select name="division_id" class="form-control">
                    <option>Please Select a Division Name</option>
                    @foreach ($divisions as $division)
                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1">Please Enter your district status.</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" name="addDistrict" value="Add New District" class="btn btn-teal btn-block mg-b-10">
            </div>

        </form>
    </div>
</div>
@endsection
