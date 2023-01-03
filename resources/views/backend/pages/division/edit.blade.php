@extends('backend.layout.template')

@section('body-content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Update Division Information</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>
<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Update Division Information</h6>
        <form action="{{ route('division.update', $division->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Division Name</label>
                <input type="text" name="division_name" value="{{ $division->name }}" placeholder="Enter Division Name" class="form-control">
            </div>

            <div class="form-group">
                <label>Priority Number [ Ex-1 ]</label>
                <input type="number" name="priority" value="{{ $division->priority }}" placeholder="Enter Priority Number" class="form-control">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1">Please Enter your division status.</option>
                    <option value="1" @if ($division->status == 1) selected @endif >Active</option>
                    <option value="0" @if ($division->status == 0) selected @endif >Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" name="updateDivision" value="Save Changes" class="btn btn-teal btn-block mg-b-10">
            </div>

        </form>
    </div>
</div>
@endsection
