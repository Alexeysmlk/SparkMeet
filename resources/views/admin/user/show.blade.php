@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin mb-3">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">User - {{$user->id}}</h3>
                    </div>
                </div>
            </div>
        </div>
        @if($user->profile)
            <div class="row">
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">First name</p>
                                    <h4 class="mb-2">{{$user->profile->first_name}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">Second name</p>
                                    <h4 class="mb-2">{{$user->profile->last_name}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">City</p>
                                    <h4 class="mb-2">{{$user->profile->city->name}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Profile creation time</p>
                                    <h4 class="mb-2">{{ $user->profile->created_at->format('d.m.Y H:i')}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-4 stretch-card transparent">
                            <div class="card card-light-blue" style="background: #d79e8f">
                                <div class="card-body">
                                    <p class="mb-4">Description</p>
                                    <h4 class="mb-2">
                                        {{$user->profile->description}}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card" style="background: #f5f7ff">
                        <div class="card-people pt-0">
                            @if($user->profile->photo_url)
                                <img
                                    src="{{ asset("storage/".$user->profile->photo_url) }}"
                                    alt="Photo of avatar">
                            @else
                                <img
                                    src="{{ asset("/assets/images/find-peoples/default-avatar-profile.jpg")}}"
                                    alt="Placeholder Photo">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="card-body">
                <blockquote class="blockquote blockquote-danger">
                    <p>The user does not have a profile yet.</p>
                </blockquote>
            </div>
        @endif
    </div>
@endsection
