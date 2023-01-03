@extends('backend.layout.template')

@section('body-content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Create New Division</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>
<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Create New Division</h6>
        <form action="{{ route('division.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Division Name</label>
                <input type="text" name="division_name" required="required" autocomplete="off" placeholder="Enter Division Name" class="form-control">
            </div>

            <div class="form-group">
                <label>Priority Number [ Ex-1 ]</label>
                <input type="number" name="priority" required="required" autocomplete="off" placeholder="Enter Priority Number" class="form-control">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1">Please Enter your division status.</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" name="addDivision" value="Add New Division" class="btn btn-teal btn-block mg-b-10">
            </div>

        </form>
    </div>
</div>
@endsection
