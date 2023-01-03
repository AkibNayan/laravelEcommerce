@extends('backend.layout.template')

@section('body-content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Update Category Information</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>
<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Update Category Information</h6>
        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Category Title</label>
                        <input type="text" name="title" value="{{ $category->title }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Primary Category [ Optional ]</label>
                        <select name="is_parent" class="form-control">
                            <option value="0">Please select the primary category.</option>
                            @foreach($parents as $p)
                            <option value="{{ $p->id }}"
                            @if($category->is_parent == 0)

                            @elseif ($category->is_parent != 0)
                                @if ($category->is_parent == $p->id)
                                    selected
                                @endif
                            @endif
                            >{{ $p->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Please Enter your category status.</option>
                            <option value="1" @if ($category->status == 1) selected @endif >Active</option>
                            <option value="0" @if ($category->status == 0) selected @endif >Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" rows="5" class="form-control">{{ $category->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="submit" name="updateCategory" value="Save Changes" class="btn btn-teal btn-block mg-b-10">
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
