@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin mb-3">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{$user->profile->first_name}}!</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                    <div class="card-people mt-auto">
                        <img src="{{asset('/assets/images/dashboard/people.svg')}}" alt="people">
                        <div class="weather-info">
                            <div class="d-flex">
                                <div>
                                    <h2 class="mb-0 font-weight-normal"><i
                                            class="{{$weatherIcons[$weather['current']['condition']['code']]}}"></i>{{ $weather['current']['temp_c'] }}
                                        °</h2>
                                </div>
                                <div class="ml-4">
                                    <h4 class="location font-weight-normal text-uppercase">{{$user->profile->city->name}}</h4>
                                    <h6 class="font-weight-normal">Сity</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-tale">
                    <div class="card-body">
                        <p class="mb-4 text-uppercase">Total number of users</p>
                        <p class="fs-30">{{$users->count()}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <p class="mb-4 text-uppercase">Total number of events</p>
                        <p class="fs-30 mb-2">{{$events->count()}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0 text-center">Last registered users</p>
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover">
                                <thead>
                                <tr>
                                    <th class="pl-0  pb-2 border-bottom">Email</th>
                                    <th class="border-bottom pb-2">Email Confirmation</th>
                                    <th class="border-bottom pb-2">Date of registration</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($last_users as $user)
                                    <tr onclick="window.location='{{ route('admin.user.show', ['user' => $user]) }}';">
                                        <td class="pl-0">{{$user->email}}</td>
                                        <td>
                                            @if ($user->email_verified_at)
                                                <i class="fas fa-check"></i>
                                            @else
                                                <i class="fas fa-times"></i>
                                            @endif
                                        </td>
                                        <td class="text-muted">{{ $user->created_at->format('d.m.Y H:i')}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0 text-center">Recent events created</p>
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover">
                                <thead>
                                <tr>
                                    <th class="pl-0  pb-2 border-bottom">Title</th>
                                    <th class="border-bottom pb-2">The author of the event</th>
                                    <th class="border-bottom pb-2">Date of creation</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($last_events as $event)
                                    <tr onclick="window.location='{{ route('admin.events.show', ['event' => $event]) }}';">
                                        <td class="pl-0">{{ $event->title }}</td>
                                        <td>{{ $event->user->profile->first_name . ' ' . $event->user->profile->last_name }}</td>
                                        <td class="text-muted">{{ $event->created_at->format('d.m.Y H:i') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
