@extends('layouts.main')

@section('content')
<main class="dashboard-mp">
    <div class="profile-banner">
        <div class="hero-cover-block">
            <div class="hero-cover">
                <div class="hero-cover-img hero-img-2"></div>
            </div>
        </div>
        <div class="user-dt-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-12">
                        <div class="main-card user-left-dt">
                            <div class="user-avatar-img">
                                <img
                                    src="{{ $profile->photo_url ? asset('/storage/' . $profile->photo_url) : asset('/assets/images/find-peoples/default-avatar-profile.jpg') }}"
                                    alt="">
                            </div>
                            <div class="user-dts">
                                <h4 class="user-name">{{__($profile->first_name)}} {{__($profile->last_name)}}
                                    <span class="verify-badge"><i class="fa-solid fa-circle-check"></i></span></h4>
                                <span class="user-loc"><i
                                        class="feather-map-pin"></i>{{__($profile->city->name)}}</span>
                            </div>
                            <div class="user-description">
                                <p>{{__($profile->description)}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-7 col-md-12">
                        <div class="user-events-block mt-4">
                            <div class="row">
                                @foreach($events as $event)
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="event-main-post">
                                            <div class="main-photo">
                                                <a href="{{route('user.events.show', ['event' =>$event])}}">
                                                    <div class="photo-overlay"></div>
                                                    <div class="photo-container">
                                                        <div class="photo-wrapper">
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
                                                </a>
                                            </div>
                                            <div class="event-body">
                                                <span class="event-time">{{ \Carbon\Carbon::parse($event->date . ' ' . $event->time)->format('D, d F Y \a\t H:i') }}</span>
                                                <a href="{{route('user.events.show', ['event' =>$event])}}"
                                                   class="event-title">{{__($event->title)}}</a>
                                                <span
                                                    class="event-type">{{__($event->city->name)}}</span>
                                                <p class="ingo-counter">
                                                    <span>{{$event->likedByUsers->count()}} Interested</span>
                                                </p>
                                                <div class="group-btns">
                                                    <a class="interest-btn btn-hover d-flex justify-content-center align-items-center" href="{{route('user.events.show', ['event' =>$event])}}"><i class="feather-eye me-2"></i>View</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
