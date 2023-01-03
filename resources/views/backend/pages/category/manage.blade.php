@extends('backend.layout.template')

@section('body-content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>Manage All Categories</h4>
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
                            <th scope="col">Category Title</th>
                            <th scope="col">Primary/Secondary[ Optional ]</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <!-- $brands is the variable from BrandController index() which contain brand Sql -->
                    <!-- $brand is any name randomly you can take -->
                    <tbody>
                        @php $i=1 @endphp

                        @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>
                                @if (!empty($category->image))
                                <img src="{{ asset('backend/img/category/' . $category->image) }}" width="30">
                                @else
                                Image Not Found
                                @endif
                            </td>
                            <td>{{ $category->title }}</td>
                            <td>
                                @if ($category->is_parent == 0)
                                <span class="badge badge-info">Primary</span>
                                @endif

                            </td>
                            <td>
                                @if ($category->status == 0)
                                <span class="badge badge-danger">Inactive</span>
                                @elseif ($category->status ==1)
                                <span class="badge badge-success">Active</span>
                                @endif

                            </td>
                            <td>
                                <div class="table-action">
                                    <ul>
                                        <li><a href="{{ route('category.edit', $category->id) }}"><i class="fa fa-edit"></i></a></li>
                                        <li><a href="" data-toggle="modal" data-target="#delete{{ $category->id }}"><i class="fa fa-trash"></i></a></li>
                                    </ul>
                                    <!-- Brand Delete Modal -->
                                    <div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content modal-filled bg-warning">
                                                <div class="modal-body p-4">
                                                    <div class="text-center text-light modal-buttons">
                                                        <i data-feather="x-octagon" class="fill-white feather-lg"></i>
                                                        <h4 class="mt-2">Are you sure to delete this Parent Category?</h4>
                                                        <button type="button" class="btn btn-light my-2" data-dismiss="modal">
                                                            Cancel
                                                        </button>
                                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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
                        <!-- Child Category -->
                        @foreach(App\Models\Category::orderby('id', 'asc')->where('is_parent', $category->id)->get() as $childCat)
                        <tr>
                            <th scope="row">

                            </th>
                            <td>
                                @if (!empty($childCat->image))
                                <img src="{{ asset('backend/img/category/' . $childCat->image) }}" width="30">
                                @else
                                Image Not Found
                                @endif
                            </td>
                            <td>{{ $childCat->title }}</td>
                            <td>
                                @if ($childCat->is_parent == 0)
                                <span class="badge badge-info">Primary</span>
                                @endif

                            </td>
                            <td>
                                @if ($childCat->status == 0)
                                <span class="badge badge-danger">Inactive</span>
                                @elseif ($childCat->status ==1)
                                <span class="badge badge-success">Active</span>
                                @endif

                            </td>
                            <td>
                                <div class="table-action">
                                    <ul>
                                        <li><a href="{{ route('category.edit', $childCat->id) }}"><i class="fa fa-edit"></i></a></li>
                                        <li><a href="" data-toggle="modal" data-target="#delete{{ $childCat->id }}"><i class="fa fa-trash"></i></a></li>
                                    </ul>
                                    <!-- Brand Delete Modal -->
                                    <div class="modal fade" id="delete{{ $childCat->id }}" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content modal-filled bg-warning">
                                                <div class="modal-body p-4">
                                                    <div class="text-center text-light modal-buttons">
                                                        <i data-feather="x-octagon" class="fill-white feather-lg"></i>
                                                        <h4 class="mt-2">Are you sure to delete this Child Category?</h4>
                                                        <button type="button" class="btn btn-light my-2" data-dismiss="modal">
                                                            Cancel
                                                        </button>
                                                        <form action="{{ route('category.destroy', $childCat->id) }}" method="POST">
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
                        @endforeach
                        @php $i++ @endphp

                        @endforeach
                    </tbody>
                    @if ($categories->count() == 0)
                    <div class="alert alert-info">
                        No Category Found Yet! Please Add New Category.
                    </div>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
