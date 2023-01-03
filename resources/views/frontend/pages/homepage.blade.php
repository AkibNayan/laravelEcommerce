@extends('frontend.layout.template')

@section('body-content')
<div role="main" class="main shop py-4">

    <div class="container">

        <div class="row">

            @include('frontend.includes.sidebar')

            <div class="col-lg-9">

                <div class="masonry-loader masonry-loader-showing">
                    <!-- Latest Product List Start -->
                    <h3>Latest Product</h3>
                    <div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
                        @foreach ($products as $product)
                        <div class="col-sm-6 col-lg-4 product">
                            @if ($product->is_featured == 1)
                            <a href="#">
                                <span class="onsale">Sale!</span>
                            </a>
                            @endif
                            <span class="product-thumb-info border-0">
                                <!-- Add to Cart -->
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="submit" name="addCart" class="add-to-cart-product bg-color-primary text-uppercase text-1" value="Add to Cart">
                                </form>

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
                                    <a href="{{ route('productDetails', $product->slug) }}">
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
                    </div>
                    <!-- Latest Product List End -->
                    <!-- Featured / Onsale Product List Start -->
                    <h3>Featured / Onsale Product</h3>
                    <div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
                        @foreach ($onsaleProducts as $product)
                        <div class="col-sm-6 col-lg-4 product">
                            @if ($product->is_featured == 1)
                            <a href="#">
                                <span class="onsale">Sale!</span>
                            </a>
                            @endif
                            <span class="product-thumb-info border-0">
                                <!-- Add to Cart -->
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="submit" name="addCart" class="add-to-cart-product bg-color-primary text-uppercase text-1" value="Add to Cart">
                                </form>

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
                                    <a href="{{ route('productDetails', $product->slug) }}">
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
                    </div>
                    <!-- Featured / Onsale Product List End -->
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
