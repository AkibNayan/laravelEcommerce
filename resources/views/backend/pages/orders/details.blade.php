@extends('backend.layout.template')

@section('body-content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Customer Order Details</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>
<div class="br-pagebody">
    <div class="br-section-wrapper">
        <div class="row">
            <div class="col-lg-4">
                <div class="order-summery-box">
                    <h3 class="br-section-label">Customer Information</h3>
                    <p><span>Full Name:</span> {{ $orderDetails->cus_name }} {{ $orderDetails->last_name }}</p>
                    <p><span>Email Address:</span> {{ $orderDetails->email }}</p>
                    <p><span>Phone No:</span> {{ $orderDetails->phone }}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-summery-box">
                    <h3 class="br-section-label">Transaction Details</h3>
                    <p><span>Total Amount:</span> {{ $orderDetails->amount }} {{ $orderDetails->currency }}</p>
                    <p><span>Transaction ID:</span> {{ $orderDetails->transaction_id }}</p>
                    <h3 class="br-section-label change-order-status">Order Status <a href="{{ route('order.edit', $orderDetails->id) }}"><i class="fa fa-edit"></i>Update Status</a></h3>
                    <p><span>Order Status:</span>
                        @if ( $orderDetails->status == 0 )
                        <span class="badge badge-info">In Processing</span>
                        @elseif( $orderDetails->status == 1 )
                        <span class="badge badge-warning">On Hold</span>
                        @elseif( $orderDetails->status == 2 )
                        <span class="badge badge-success">Successfully Delivered</span>
                        @elseif( $orderDetails->status == 3 )
                        <span class="badge badge-danger">Canceled</span>
                        @endif

                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-summery-box">
                    <h3 class="br-section-label">Shipping Address</h3>
                    <p><span>Shipping Address:</span> {{ $orderDetails->address }}</p>
                    <p><span>District:</span> {{ $orderDetails->district->district_name }}</p>
                    <p><span>Division:</span> {{ $orderDetails->division->name }}</p>
                    <p><span>Country:</span> {{ $orderDetails->country }}</p>
                    <p><span>Zip Code:</span> {{ $orderDetails->post_code }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 product-list-heading">
                <div class="order-product-summery-box">
                    <h3 class="br-section-label">Order Items List</h3>
                    <!-- Product List Start -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#Sl.</th>
                                <th scope="col">Image</th>
                                <th scope="col">Product Title</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach( App\Models\Cart::orderBy('id', 'asc')->where('order_id', $orderDetails->id)->get() as $productDetails )
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>
                                    @php $j=1; @endphp
                                    @foreach($productDetails->product->images as $img)
                                    @if ($j > 0)
                                    <img src="{{ asset('backend/img/products/'. $img->image) }}" width="35">
                                    @endif

                                    @php $j--; @endphp
                                    @endforeach
                                </td>
                                <td>{{ $productDetails->product->title }}</td>
                                <td>{{ $productDetails->quantity }} Pcs</td>
                                <td>{{ $productDetails->unit_price }} BDT</td>
                                <td>{{ $productDetails->quantity * $productDetails->unit_price }} BDT</td>
                            </tr>
                            @php $i++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Product List End -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 product-list-heading">
                <div class="order-product-summery-box message-note">
                    <div class="alert alert-primary text-center">
                        <h5>Customer Message</h5>
                        {{ $orderDetails->message }}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 product-list-heading">
                <div class="order-product-summery-box message-note">
                    <div class="alert alert-primary text-center">
                        <h5>Admin Note</h5>
                        {{ $orderDetails->admin_note }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
