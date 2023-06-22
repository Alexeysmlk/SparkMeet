@extends('layouts.main')

@section('content')
    <!-- Title Bar Start -->
    <div class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="title-bar-text">
                        <li class="breadcrumb-item"><a href="{{route('user.events.index')}}">Main</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Viewing an event</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Bar End -->
    <!-- Body Start -->
    <main class="evnt-px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="main-card">
                        <div class="event-detail-content">
                            <div class="event-main-img">
                                @if($event->photo_url)
                                    <img
                                        src="{{ asset("storage/$event->photo_url") }}"
                                        alt="Photo of event">
                                @else
                                    <img
                                        src="{{ asset("/assets/images/placeholderForEvent.png") }}"
                                        alt="Placeholder Photo">
                                @endif
                                <div class="event-date">
                                    <span
                                        class="emnth">{{ \Carbon\Carbon::parse($event->date)->format('M') }}</span>
                                    <span
                                        class="edate">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</span>
                                </div>

                            </div>
                            <div class="event-title-dts">
                                <span
                                    class="evnt_time txtbold text-uppercase">{{ \Carbon\Carbon::parse($event->date . ' ' . $event->time)->format('D, d F Y \a\t H:i') }}</span>
                                <h3 class="event-heading-title text-left mb-0">{{__($event->title)}}</h3>
                            </div>
                            <div class="d-md-flex d-block align-self-center p-20">
                                <div class="ttlcnt15 invtbyuser">
                                    <div class="invited_avtar_ee">
                                        @if($profile->photo_url)
                                            <img
                                                src="{{ asset('/storage/' . $profile->photo_url) }}"
                                                alt="Photo of profile">
                                        @else
                                            <img
                                                src="{{ asset('/assets/images/find-peoples/default-avatar-profile.jpg') }}"
                                                alt="Photo of profile">
                                        @endif
                                    </div>
                                    <span
                                        class="evntcunt">{{"Publish by " . $profile->first_name." ".$profile->last_name}}</span>
                                </div>
                                <div class="ms-auto mt-4 mt-md-0 mt-lg-0 mt-xl-0">
                                    @if($user->id !== $event->user_id)
                                        <ul class="egroup-btns">
                                            <li><a class="main--btn view-hover" href="#"><i
                                                        class="feather-star me-2"></i>Interested</a>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-card mt-30">
                        <div class="categories-left-heading border_bottom">
                            <h3>Details</h3>
                        </div>
                        <div class="evntdt99 p-20">
                            <div class="mndtlist alrspndpple gowthfdsbtn">
                                <div class="evntflldt4 flxcntr">
                                    <div class="hhttd14s">
                                        <i class="feather-users"></i>
                                    </div>
                                    <div class="ttlpple">
                                        <span>5 people responded</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mndtlist">
                                <div class="evntflldt4 flxcntr">
                                    <div class="hhttd14s">
                                        <i class="feather-map-pin"></i>
                                    </div>
                                    <div class="ttlpple">
                                        <span>{{$event->city->name}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mndtlist">
                                <div class="evntflldt4">
                                    <div class="hhttd14s">
                                        <i class="feather-clock"></i>
                                    </div>
                                    <div class="ttlpple">
                                        <span class="text-uppercase">{{ \Carbon\Carbon::parse($event->date . ' ' . $event->time)->format('D, d F Y \a\t H:i') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mndtlist">
                                <div class="mndesp145">
                                    <div class="evarticledes">
                                        <p class="mb-0">{{$event->description}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tagtlist">
                                <ul class="taglst17">
                                    <li>
                                        <a href="#" class="tagbite">Party</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="main-card">
                        <div class="categories-left-heading border_bottom">
                            <h3>Host</h3>
                        </div>
                        <div class="p-20">
                            <div class="user-follow-card">
                                <div class="follow-card-left">
                                    <div class="follow-avatar">
                                        @if($profile->photo_url)
                                            <img
                                                src="{{ asset('/storage/' . $profile->photo_url) }}"
                                                alt="Photo of profile">
                                        @else
                                            <img
                                                src="{{ asset('/assets/images/find-peoples/default-avatar-profile.jpg') }}"
                                                alt="Photo of profile">
                                        @endif
                                    </div>
                                    <div class="follow-name">
                                        <a href="{{route('user.profile.show', ['profile'=>$profile])}}">{{__($profile->first_name." ".$profile->last_name)}}</a>
                                        <span>Event Orgnizar</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-card">
                        <div class="categories-left-heading border_bottom">
                            <h3>People who are interesteds</h3>
                        </div>
                        <div class="p-20 pt-0">
                            <div class="user-info__sections">
                                <div class="invite_info__sections scroll1452 p-0">
                                    <div class="user-follow-card mt-4">
                                        <div class="follow-card-left">
                                            <div class="follow-avatar">
                                                <img src="images/find-peoples/user-2.jpg" alt="">
                                            </div>
                                            <div class="follow-name">
                                                <a href="user_profile.html">Jassica William</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Body End -->
@endsection
