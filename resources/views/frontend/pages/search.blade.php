@extends('frontend.layout.template')

@section('body-content')
<div role="main" class="main shop py-4">

    <div class="container">

        <div class="row">

            @include('frontend.includes.sidebar')

            <div class="col-lg-9">

                <div class="masonry-loader masonry-loader-showing">
                    <div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">

                        @if ($products->count() > 0)
                        @foreach($products as $product)
                        <div class="col-sm-6 col-lg-4 product">
                            <a href="#">
                                @if ($product->is_featured == 0)

                                @elseif($product->is_featured == 1)
                                <span class="onsale">Sale!</span>
                                @endif

                            </a>
                            <span class="product-thumb-info border-0">
                                <!-- Add to Cart -->
                                <a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
                                    <span class="text-uppercase text-1">Add to Cart</span>
                                </a>
                                <!-- Product Image -->
                                <a href="{{ route('productDetails', $product->slug) }}">
                                    <span class="product-thumb-info-image">
                                        @php $j=1; @endphp
                                        @foreach($product->images as $img)
                                        @if ($j > 0)
                                        <img src="{{ asset('backend/img/products/'. $img->image) }}" alt="{{ $product->title }}" class="img-fluid">
                                        @endif

                                        @php $j--; @endphp
                                        @endforeach

                                    </span>
                                </a>
                                <span class=" product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
                                    <a href="shop-product-sidebar-left.html">
                                        <h4 class="text-4 text-primary">{{ $product->title }}</h4>
                                        <span class="price">
                                            @if ($product->is_featured == 0)

                                            <ins><span class="amount text-dark font-weight-semibold">৳ {{ $product->regular_price }}</span></ins>
                                            @elseif ($product->is_featured == 1)

                                            <del><span class="amount">৳ {{ $product->regular_price }}</span></del>
                                            <ins><span class="amount text-dark font-weight-semibold">৳ {{ $product->offer_price }}</span></ins>
                                            @endif


                                        </span>
                                    </a>
                                </span>
                            </span>
                        </div>
                        @endforeach
                        @else
                        <div class="alert alert-info">
                            Sorry!!! No product found in your search keyword -> <strong>{{ $search }}</strong>
                        </div>
                        @endif



                    </div>
                    <div class="row">
                        <div class="col">
                            <ul class="pagination float-right">
                                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>

                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
