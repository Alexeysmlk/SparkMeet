@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin mb-3">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Tags</h3>
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
                            When you <mark class="bg-danger text-white">delete</mark> a tag, it will also be <mark class="bg-danger text-white">removed</mark> from related events.                        </p>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-sm-center">
                            <a href="{{route('admin.tags.create')}}"
                               class="btn btn-outline-success btn-fw mx-auto">Add a new tag</a>
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
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>
                                            {{$tag->id}}
                                        </td>
                                        <td>
                                            {{$tag->name}}
                                        </td>
                                        <td>
                                            <div class="row d-flex justify-content-around">
                                                <a href="{{ route('admin.tags.edit', ['tag' => $tag]) }}"
                                                   class="btn btn-inverse-primary btn-fw">Edit
                                                </a>
                                                <div>
                                                    <form
                                                        action="{{ route('admin.tags.destroy', ['tag' => $tag]) }}"
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
                                {{ $tags->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
