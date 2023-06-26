@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin mb-3">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Users</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive pt-3">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Email Confirmation
                                    </th>
                                    <th>
                                        Date of registration
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            {{$user->id}}
                                        </td>
                                        <td>
                                            {{$user->email}}
                                        </td>
                                        <td>
                                            @if ($user->email_verified_at)
                                                <i class="fas fa-check"></i>
                                            @else
                                                <i class="fas fa-times"></i>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $user->created_at->format('d.m.Y H:i')}}                                        </td>
                                        <td>
                                        <td>
                                            <div class="row d-flex justify-content-around">
                                                <a href="{{ route('admin.user.show', ['user' => $user]) }}"
                                                   class="btn btn-inverse-info btn-fw">Info</a>
                                                <form action="{{ route('admin.user.change-role', $user) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="{{ $user->hasRole('admin') ? 'btn btn-danger' : 'btn btn-primary' }}">
                                                        {{ $user->hasRole('admin') ? 'Assign by user' : 'Appoint an administrator' }}
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="px-5 mt-5">
                                {{ $users->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
