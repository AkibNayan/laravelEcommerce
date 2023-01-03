@extends('backend.layout.template')

@section('body-content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Update District Information</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>
<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Update District Information</h6>
        <form action="{{ route('district.update', $district->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>District Name</label>
                <input type="text" name="district_name" value="{{ $district->district_name  }}" placeholder="Enter District Name" class="form-control">
            </div>

            <div class="form-group">
                <label>Division Name</label>
                <select name="division_id" class="form-control">
                    <option>Please Select a Division Name</option>
                    @foreach ($divisions as $division)
                    <option value="{{ $division->id }}"
                        @if ($division->id == $district->division_id)
                            selected
                        @endif
                        >{{ $division->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1">Please Enter your district status.</option>
                    <option value="1" @if ($district->status == 1) selected @endif >Active</option>
                    <option value="0" @if ($district->status == 0) selected @endif >Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" name="updateDistrict" value="Save Changes" class="btn btn-teal btn-block mg-b-10">
            </div>

        </form>
    </div>
</div>
@endsection
