@extends('layouts.main')

@section('content')
    <main>
        <div class="main-section">
            <div class="container">
                <div class="row">
                    <div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                        <div class="center-section">
                            <div class="main-search-bar">
                                <h2>Events happening in your city</h2>
                                <form>
                                    <div class="main-search-inputs main-form">
                                        <div class="row g-3">
                                            <div class="col-lg-5 col-md-12 col-sm-12">
                                                <input class="search-form-input" type="text"
                                                       placeholder="Search events">
                                            </div>
                                            <div class="col-lg-5 col-md-12 col-sm-12">
                                                <input class="search-form-input datepicker-here" data-language='en'
                                                       type="text" placeholder="Select Date">
                                            </div>
                                            <div class="col-lg-2 col-md-12 col-sm-12">
                                                <button class="search-btn" type="submit"><i
                                                        class="feather-search"></i><span>Search</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
                                            <a class="category-item" href="explore.html">
                                                @if($category->icon_path)
                                                    <img src="{{ asset("storage/$category->icon_path") }}" alt="Icon">
                                                @endif
                                                {{ $category->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="right-side-items mt-0 mt-md-5 mt-lg-5 mt-xl-0">
                            <div class="post-event">
                                <h6>Want to Post Your Event</h6>
                                <p>Post your event on Goeveni for free. Just make an account and add it through the
                                    simple form. As simple as that.</p>
                                <a href="{{route('user.events.create')}}" class="add-nw-event">Post It Now</a>
                            </div>
                            <div class="w-weather">
                                <div class="weather-top">
                                    <div class="weather-left">
                                        <div class="weather-city">Ludhiana</div>
                                        <div class="week-text">Monday</div>
                                        <div class="week-text">14 Oct 2019</div>
                                        <div class="week-text" style="font-size: 18px;"><i class="fas fa-tint"></i> 30%
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="up-down"><i class="fas fa-long-arrow-alt-up"></i> 18°</div>
                                            </li>
                                            <li>
                                                <div class="up-down"><i class="fas fa-long-arrow-alt-down"></i> 25°
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="weather-right">
                                        <i class="feather-sun"></i>
                                        <span>22°</span>
                                    </div>
                                </div>
                                <ul class="weekly-weather">
                                    <li>
                                        <div class="degree-text">32°</div>
                                        <div class="weather-icon"><i class="fas fa-sun"></i></div>
                                        <div class="day-text">Tue</div>
                                    </li>
                                    <li>
                                        <div class="degree-text">19°</div>
                                        <div class="weather-icon"><i class="fa-solid fa-cloud-sun-rain"></i></div>
                                        <div class="day-text">Wed</div>
                                    </li>
                                    <li>
                                        <div class="degree-text">32°</div>
                                        <div class="weather-icon"><i class="fas fa-sun"></i></div>
                                        <div class="day-text">Thu</div>
                                    </li>
                                    <li>
                                        <div class="degree-text">27°</div>
                                        <div class="weather-icon"><i class="fas fa-wind"></i></div>
                                        <div class="day-text">Fri</div>
                                    </li>
                                    <li>
                                        <div class="degree-text">22°</div>
                                        <div class="weather-icon"><i class="fas fa-cloud-showers-heavy"></i></div>
                                        <div class="day-text">Sat</div>
                                    </li>
                                    <li>
                                        <div class="degree-text">12°</div>
                                        <div class="weather-icon"><i class="fas fa-snowflake"></i></div>
                                        <div class="day-text">Sun</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
