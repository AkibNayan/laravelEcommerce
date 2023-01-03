@extends('backend.layout.template')

@section('body-content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Update Existing Brand</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>
<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Update Existing Brand</h6>
        <form action="{{ route('brand.update', $brand_id->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Brand Name</label>
                <input type="text" name="brand_name" value="{{ $brand_id->name }}" class="form-control">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1">Please Enter your brand status.</option>
                    <option value="1" @if($brand_id->status == 1) selected @endif >Active</option>
                    <option value="0" @if($brand_id->status == 0) selected @endif >Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control-file">
            </div>

            <div class="form-group">
                <input type="submit" name="updatebrand" value="Save Changes" class="btn btn-teal btn-block mg-b-10">
            </div>

        </form>
    </div>
</div>
@endsection
