@extends('backend.layout.template')

@section('body-content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Create New Product</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>
<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Create New Product</h6>
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-6">

                    <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" name="title" required="required" autocomplete="off" placeholder="Enter Product Title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Brand Name</label>
                        <select name="brand_id" class="form-control">
                            <option>Please Enter Your Brand Name</option>
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Category Name</label>
                        <select name="category_id" class="form-control">
                            <option>Please Enter Your Category Name</option>
                            @foreach($categories as $pCat)
                            <option value="{{ $pCat->id }}">{{ $pCat->title }}</option>
                            @foreach(App\Models\Category::orderby('title', 'asc')->where('is_parent', $pCat->id)->get() as $cCat)
                            <option value="{{ $cCat->id }}">-- {{ $cCat->title }}</option>
                            @endforeach
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Quantity [ Ex : 5 ]</label>
                        <input type="text" name="quantity" required="required" autocomplete="off" placeholder="Enter Product Quantity" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Regular Price</label>
                        <input type="text" name="regular_price" required="required" autocomplete="off" placeholder="Enter Product Regular Price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Offer Price [Optional]</label>
                        <input type="text" name="offer_price" autocomplete="off" placeholder="Enter Product Offer Price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Featured Product</label>
                        <select name="is_featured" class="form-control">
                            <option value="0">Please Enter Your Featured Status.</option>
                            <option value="1">Featured</option>
                            <option value="0">Regular Product</option>
                        </select>
                    </div>

                </div>
                <div class="col-lg-6">

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Please Enter Your Product Status.</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea name="short_description" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Product Search Tags [ Separated with comma (,) ]</label>
                        <input type="text" name="tags" class="form-control" placeholder="Enter Product Tags">
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Main Thumbnail *</label>
                                <input type="file" name="image[]" class="form-control-file" required="required">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Extra Image 1</label>
                                <input type="file" name="image[]" class="form-control-file">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Extra Image 2</label>
                                <input type="file" name="image[]" class="form-control-file">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="submit" name="addProduct" value="Add New Product" class="btn btn-teal btn-block mg-b-10">
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
