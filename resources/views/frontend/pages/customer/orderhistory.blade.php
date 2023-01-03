@extends('frontend.layout.template')

@section('body-content')
<div role="main" class="main shop py-4">

    <div class="container">

        <div class="row">
            <div class="col">

                <div class="featured-boxes">
                    <div class="row">
                        <div class="col">
                            <div class="featured-box featured-box-primary text-left mt-2">
                                <div class="box-content order-history">
                                    <!-- Order History Page Content Area Start -->
                                    <div class="row">
                                        <!-- order history left menu -->
                                        <div class="col-lg-2">
                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Order History</a>
                                            </div>
                                        </div>
                                        <!-- Table Content -->
                                        <div class="col-lg-10">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                    <!-- Table Start -->
                                                    <table class="table table-bordered table-hover table-striped">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">#SL.</th>
                                                                <th scope="col">Order Id</th>
                                                                <th scope="col">Order Date</th>
                                                                <th scope="col">Items</th>
                                                                <th scope="col">Total Amount</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">Invoice</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $i=1; @endphp
                                                            @foreach($orders as $order)
                                                            <tr>
                                                                <th scope="row">{{ $i }}</th>
                                                                <td>#Id {{ $order->id }}</td>
                                                                <td>{{ $order->updated_at }}</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-primary">
                                                                        Products
                                                                    </button>
                                                                    <!-- Product Details Modal Start -->

                                                                    <!-- Product Details Modal End -->
                                                                </td>
                                                                <td>{{ $order->amount }}</td>
                                                                <td>
                                                                    @if( $order->status == 0 )
                                                                    <span class="badge badge-primary">In Processing</span>

                                                                    @elseif( $order->status == 1 )
                                                                    <span class="badge badge-warning">Hold</span>
                                                                    @elseif( $order->status == 2 )
                                                                    <span class="badge badge-success">Completed</span>

                                                                    @elseif( $order->status == 3 )
                                                                    <span class="badge badge-danger">Canceled</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('order-invoice', $order->id) }}" target="_blank">Click to See Invoice</a>
                                                                </td>
                                                            </tr>
                                                            @php $i++; @endphp
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Order History Page Content Area End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
