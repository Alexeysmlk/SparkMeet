@extends('layouts.main')

@section('content')
    <main>
        <div class="main-section">
            <div class="container">
                <div class="row">
                    <div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                        <div class="center-section">
                            <div class="main-tabs">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab-top">
                                        @if(count($events) === 0)
                                            <div class="full-width">
                                                <div class="no-events">
                                                    <div class="no-event-icon">
                                                        <img src="{{asset('/assets/images/icon-calendar.png')}}" alt="">
                                                    </div>
                                                    <span>No events found.</span>
                                                </div>
                                            </div>
                                        @else
                                            <div class="main-posts">
                                                {{ $events->links('vendor.pagination.bootstrap-5') }}
                                                <div class="row">
                                                    @foreach($events as $event)
                                                        <div class="col-md-6">
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
                                                                <span
                                                                    class="event-time">{{ \Carbon\Carbon::parse($event->date . ' ' . $event->time)->format('D, d F Y \a\t H:i') }}</span>
                                                                    <a href="{{route('user.events.show', ['event' =>$event])}}"
                                                                       class="event-title">{{__($event->title)}}</a>
                                                                    <span
                                                                        class="event-type">{{__($event->city->name)}}</span>
                                                                    <p class="ingo-counter">
                                                                        <span>25 Interested</span>
                                                                    </p>
                                                                    <div class="group-btns">
                                                                        @if(\Illuminate\Support\Facades\Auth::id() !== $event->user_id)
                                                                            <form  method="POST" class="interest-btn btn-hove d-flex justify-content-center align-items-center"
                                                                                action="{{route('user.events.like', $event)}}">
                                                                                @csrf
                                                                                <button class="interest-btn btn-hover">
                                                                                    <i
                                                                                        class="feather-star me-2"></i>{{ \Illuminate\Support\Facades\Auth::user()->likedEvents->contains($event) ? 'Not interested' : 'Interested' }}
                                                                                </button>
                                                                            </form>
                                                                        @else
                                                                            <span
                                                                                class="interest-btn d-flex justify-content-center align-items-center">You're owner</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    {{ $events->links('vendor.pagination.bootstrap-5') }}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
                        <div class="main-left-sidebar mt-5 mt-lg-5 mt-xl-0">
                            <div class="user-data full-width">
                                <div class="user-profile">
                                    <div class="username-dt dpbg-1"
                                         style="background-image: url({{ $profile->background_url ? asset('/storage/' . $profile->background_url) : asset('/assets/images/find-peoples/default-bg-profile.jpg') }})">
                                        <div class="usr-pic">
                                            @if($profile->photo_url)
                                                <img
                                                    src="{{ asset('/storage/' . $profile->photo_url) }}"
                                                    alt="Photo of event">
                                            @else
                                                <img
                                                    src="{{ asset('/assets/images/find-peoples/default-avatar-profile.jpg') }}"
                                                    alt="Placeholder Photo">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="user-main-details">
                                        <h4>{{__($profile->first_name)}} {{__($profile->last_name)}}</h4>
                                        <span><i class="feather-map-pin"></i>{{__($profile->city->name)}}</span>
                                    </div>
                                    <div class="profile-link">
                                        <a href="{{route('user.profile.index')}}">View Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="user-data full-width">
                                <div class="categories-left-heading">
                                    <h3>Categories</h3>
                                </div>
                                <div class="categories-items">
                                    <div class="categories-container">
                                        @foreach($categories as $category)
                                            <span class="category-item">
                                                @if($category->icon_path)
                                                    <img src="{{ asset("storage/images/$category->icon_path") }}" alt="Icon">
                                                @endif
                                                {{ $category->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="right-side-items mt-0 mt-md-5 mt-lg-5 mt-xl-0">
                            <div class="post-event">
                                <h6>Create your own event</h6>
                                <p>It's easy and only takes a minute.  Click the button below.</p>
                                <a href="{{route('user.events.create')}}" class="add-nw-event">Post It Now</a>
                            </div>
                            <div class="w-weather">
                                <div class="weather-top">
                                    <div class="weather-left">
                                        <div class="weather-city">{{ $profile->city->name }}</div>
                                        <div class="week-text">{{ now()->format('l') }}</div>
                                        <div class="week-text">{{ now()->format('d M Y') }}</div>
                                        <div class="week-text" style="font-size: 18px;"><i class="fas fa-tint"></i> {{ $weather['current']['humidity'] }}%</div>
                                        <ul>
                                            <li>
                                                <div class="up-down"><i class="fas fa-long-arrow-alt-up"></i> {{ $weather['current']['temp_c'] }}°</div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="weather-right">
                                        <i class="{{ $weatherIcons[$weather['current']['condition']['code']] }}"></i>
                                        <span>{{ $weather['current']['temp_c'] }}°</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
