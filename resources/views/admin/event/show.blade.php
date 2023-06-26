@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin mb-3">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Event - {{$event->id}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Event name</p>
                                <h4 class="mb-2">{{$event->title}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Author</p>
                                <h4 class="mb-2">{{$event->user->profile->first_name." ".$event->user->profile->last_name}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Category</p>
                                <h4 class="mb-2">{{$event->category->name}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">City of the event</p>
                                <h4 class="mb-2">{{$event->city->name}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-light-blue" style="background: #83c48a">
                            <div class="card-body">
                                <p class="mb-4">Time of the event</p>
                                <h4 class="mb-2">
                                    {{ \Carbon\Carbon::parse($event->date.' '.$event->time)->format('d.m.Y H:i') }}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-light-blue" style="background: #e2d085">
                            <div class="card-body">
                                <p class="mb-4">Tags</p>
                                <h4 class="mb-2">
                                    @foreach($event->tags as $tag)
                                        {{$tag->name}}
                                    @endforeach
                                </h4>
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
                                    {{$event->description}}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card" style="background: #f5f7ff">
                    <div class="card-people pt-0">
                        @if($event->photo_url)
                            <img
                                src="{{ asset("storage/$event->photo_url") }}"
                                alt="Photo of event">
                        @else
                            <img
                                src="{{ asset("/assets/images/placeholderForEvent.png") }}"
                                alt="Placeholder Photo">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
