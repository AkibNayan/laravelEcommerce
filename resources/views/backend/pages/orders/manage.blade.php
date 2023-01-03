@extends('backend.layout.template')

@section('body-content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Manage All Order</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>
<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Order Table</h6>
        <div class="bd bd-gray-300 rounded">
            <div class="row">
                <div class="col-lg-12">
                    @if ($orders->count() == 0)
                    <div class="alert alert-info">Sorry!! No Orders Records Found.</div>
                    @else
                    <table class="table table-bordered table-striped">
                        <thead class="thead-colored thead-dark">
                            <tr>
                                <th scope="col">#Sl.</th>
                                <th scope="col">Date and Time</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Order Details</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <!-- $orders is the variable from OrderController index() which contain order Sql -->
                        <!-- $order is any name randomly you can take -->
                        <tbody>
                            @php $i=1 @endphp

                            @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <th scope="row">{{ $order->created_at }}</th>
                                <td>{{ $order->cus_name }} {{ $order->last_name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address }}</td>
                                <td>
                                    <a href="{{ route('order.details', $order->id) }}" class="btn btn-info btn-sm">See Details</a>
                                </td>
                                <td>
                                    <div class="table-action">
                                        <ul>
                                            <li><a href="{{ route('order.edit', $order->id) }}"><i class="fa fa-edit"></i></a></li>
                                            <li><a href="" data-toggle="modal" data-target="#delete{{ $order->id }}"><i class="fa fa-trash"></i></a></li>
                                        </ul>

                                    </div>
                                </td>
                            </tr>
                            @php $i++ @endphp

                            @endforeach
                        </tbody>
                    </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
