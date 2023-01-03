@extends('backend.layout.template')

@section('body-content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Update Product Information</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>
<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Update Product Information</h6>
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-6">

                    <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" name="title" autocomplete="off" placeholder="Enter Product Title" class="form-control" value="{{ $product->title }}">
                    </div>

                    <div class="form-group">
                        <label>Brand Name</label>
                        <select name="brand_id" class="form-control">
                            <option>Please Enter Your Brand Name</option>
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" @if ($product->brand_id == $brand->id)
                                selected
                                @endif

                                >{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Category Name</label>
                        <select name="category_id" class="form-control">
                            <option>Please Enter Your Category Name</option>
                            @foreach($categories as $pCat)
                            <option value="{{ $pCat->id }}" @if ($product->category_id == $pCat->id)
                                selected
                                @endif

                                >{{ $pCat->title }}</option>
                            @foreach(App\Models\Category::orderby('title', 'asc')->where('is_parent', $pCat->id)->get() as $cCat)
                            <option value="{{ $cCat->id }}" @if ($product->category_id == $cCat->id)
                                selected
                                @endif

                                >-- {{ $cCat->title }}</option>
                            @endforeach
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Quantity [ Ex : 5 ]</label>
                        <input type="text" name="quantity" autocomplete="off" placeholder="Enter Product Quantity" class="form-control" value="{{ $product->quantity }}">
                    </div>

                    <div class="form-group">
                        <label>Regular Price</label>
                        <input type="text" name="regular_price" autocomplete="off" placeholder="Enter Product Regular Price" class="form-control" value="{{ $product->regular_price }}">
                    </div>

                    <div class="form-group">
                        <label>Offer Price [Optional]</label>
                        <input type="text" name="offer_price" autocomplete="off" placeholder="Enter Product Offer Price" class="form-control" value="{{ $product->offer_price }}">
                    </div>

                    <div class="form-group">
                        <label>Featured Product</label>
                        <select name="is_featured" class="form-control">
                            <option value="0">Please Enter Your Featured Status.</option>
                            <option value="1" @if ($product->is_featured == 1) selected @endif >Featured</option>
                            <option value="0" @if ($product->is_featured == 0) selected @endif >Regular Product</option>
                        </select>
                    </div>

                </div>
                <div class="col-lg-6">

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Please Enter Your Product Status.</option>
                            <option value="1" @if ($product->status == 1) selected @endif >Active</option>
                            <option value="0" @if ($product->status == 0) selected @endif >Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea name="short_description" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" rows="5" class="form-control">{{ $product->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Product Search Tags [ Separated with comma (,) ]</label>
                        <input type="text" name="tags" class="form-control" placeholder="Enter Product Tags" value="{{ $product->tags }}">
                    </div>

                    <div class="row">
                        @foreach($product->images as $img)
                        <img src="{{ asset('backend/img/products/'. $img->image) }}" width="50">
                        @endforeach
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Main Thumbnail</label>
                                <input type="file" name="image[]" class="form-control-file">
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
                        <input type="submit" name="updateProduct" value="Save Changes" class="btn btn-teal btn-block mg-b-10">
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
