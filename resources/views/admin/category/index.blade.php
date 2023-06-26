@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin mb-3">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Categories</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pay attention!</h4>
                        <p>
                            If the category is <mark class="bg-danger text-white">deleted</mark>, all related events will also be <mark class="bg-danger text-white">deleted</mark>!
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-sm-center">
                            <a href="{{route('admin.categories.create')}}"
                               class="btn btn-outline-success btn-fw mx-auto">Add a new category</a>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        The path to the icon
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            {{$category->id}}
                                        </td>
                                        <td>
                                            {{$category->name}}
                                        </td>
                                        <td>
                                            {{$category->icon_path}}
                                        </td>
                                        <td>
                                            <div class="row d-flex justify-content-around">
{{--                                                <a href="{{ route('admin.categories.show', ['category' => $category]) }}"--}}
{{--                                                   class="btn btn-inverse-info btn-fw">Info</a>--}}
                                                <a href="{{ route('admin.categories.edit', ['category' => $category]) }}"
                                                   class="btn btn-inverse-primary btn-fw">Edit
                                                </a>
                                                <div>
                                                    <form
                                                        action="{{ route('admin.categories.destroy', ['category' => $category]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-inverse-danger btn-fw">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="px-5 mt-5">
                                {{ $categories->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
