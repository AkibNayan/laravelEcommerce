@extends('backend.layout.template')

@section('body-content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Manage All Product</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>
<div class="br-pagebody">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-base bd-0 overflow-hidden">
                <table class="table table-bordered table-striped">
                    <thead class="thead-colored thead-dark">
                        <tr>
                            <th scope="col">#Sl.</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Regular Price</th>
                            <th scope="col">Offer Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Featured</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <!-- $brands is the variable from BrandController index() which contain brand Sql -->
                    <!-- $brand is any name randomly you can take -->
                    <tbody>
                        @php $i=1 @endphp

                        @foreach($products as $product)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>
                                @php $j=1; @endphp
                                @foreach($product->images as $img)
                                @if ($j > 0)
                                    <img src="{{ asset('backend/img/products/'. $img->image) }}" width="50">
                                @endif

                                @php $j--; @endphp
                                @endforeach
                            </td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->category->title }}</td>
                            <td>{{ $product->brand->name }}</td>
                            <td>{{ $product->regular_price }}</td>
                            <td>
                                @if (!empty($product->offer_price))
                                {{ $product->offer_price }}
                                @else
                                -N/A-
                                @endif
                            </td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                @if ($product->is_featured == 1)
                                <span class="badge badge-info">Active</span>
                                @elseif ($product->is_featured == 0)
                                <span class="badge badge-dark">Iactive</span>
                                @endif
                            </td>
                            <td>
                                @if ($product->status == 1)
                                <span class="badge badge-success">Active</span>
                                @elseif ($product->status == 0)
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="table-action">
                                    <ul>
                                        <li><a href="{{ route('product.edit', $product->id) }}"><i class="fa fa-edit"></i></a></li>
                                        <li><a href="" data-toggle="modal" data-target="#delete{{ $product->id }}"><i class="fa fa-trash"></i></a></li>
                                    </ul>
                                    <!-- Brand Delete Modal -->
                                    <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content modal-filled bg-warning">
                                                <div class="modal-body p-4">
                                                    <div class="text-center text-light modal-buttons">
                                                        <i data-feather="x-octagon" class="fill-white feather-lg"></i>
                                                        <h4 class="mt-2">Are you sure to delete this Product?</h4>
                                                        <button type="button" class="btn btn-light my-2" data-dismiss="modal">
                                                            Cancel
                                                        </button>
                                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                            @csrf
                                                            <input type="submit" class="btn btn-danger my-2" value="Confirm">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php $i++ @endphp

                        @endforeach
                    </tbody>
                </table>
                @if ($products->count() == 0)
                <div class="alert alert-info">
                    No Products Found Yet. Please Add New Product for Shipping Management.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
