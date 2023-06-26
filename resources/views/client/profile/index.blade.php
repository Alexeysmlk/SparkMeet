@extends('layouts.main')

@section('content')
    <!-- Edit Profile Model Start -->
    <div class="main-discussion-model">
        <div class="modal fade" id="edit-profile-model" role="dialog" aria-labelledby="editprofileLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content main-form">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editprofileLabel">Edit Profile</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="feather-x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">

                            <form action="{{route('user.profile.update', ['profile'=>$profile])}}" method="POST"
                                  id="edit-profile-form">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group mt-4">
                                            <label class="form-label">First Name</label>
                                            <input class="form-input h_40" type="text" placeholder=""
                                                   value="{{__($profile->first_name)}}"
                                                   name="first_name">
                                            @foreach($errors->get('first_name') as $error)
                                                <span style="color: red">{{$error}}</span><br>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group mt-4">
                                            <label class="form-label">Last Name</label>
                                            <input class="form-input h_40" type="text" placeholder=""
                                                   value="{{__($profile->last_name)}}"
                                                   name="last_name">
                                            @foreach($errors->get('last_name') as $error)
                                                <span style="color: red">{{$error}}</span><br>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group mt-4">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-textarea" placeholder=""
                                                      name="description">{{__($profile->description)}}</textarea>
                                            @foreach($errors->get('description') as $error)
                                                <span style="color: red">{{$error}}</span><br>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <h4 class="address-title">Address</h4>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group main-form mt-4">
                                            <label class="form-label">City *</label>
                                            <div class="dropdown bootstrap-select">
                                                <select class="selectpicker" data-size="5" title="Nothing selected"
                                                        data-live-search="true" name="city_id">
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}"
                                                                @selected($city->id ==
                                                            $profile->city_id)>{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                                @foreach($errors->get('city_id') as $error)
                                                    <span style="color: red">{{$error}}</span><br>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="co-main-btn cancel-btn" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="main-btn btn-hover" onclick="submitForm()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Profile Model End -->
    <!-- Body Start -->
    <main class="dashboard-mp">
        <div class="profile-banner">
            <div class="hero-cover-block">
                <div class="hero-cover">
                    <div class="hero-cover-img"
                         style="background-image: url({{ $profile->background_url ? asset('/storage/' . $profile->background_url) : asset('/assets/images/find-peoples/default-bg-profile.jpg') }})">
                    </div>
                </div>
                <div class="upload-profile-cover">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="cover-img-btn">
                                    <form id="cover-img-form" action="{{ route('user.profile.upload') }}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" id="cover-img" name="background_url" style="display: none;"
                                               accept="image/jpeg,png,jpg">
                                        <label for="cover-img"><i class="feather-image me-2"></i>Change Image</label>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <div class="avatar-img-btn">
                                        <form id="avatar-img-form" action="{{ route('user.profile.upload') }}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" id="avatar-img" name="photo_url" style="display: none;"
                                                   accept="image/jpeg,png,jpg">
                                            <label for="avatar-img"><i class="feather-camera"></i></label>
                                        </form>
                                    </div>
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
                                <div class="user-btns">
                                    <a href="{{route('user.profile.edit')}}"
                                       class="co-main-btn co-btn-width min-width d-inline-block h_40"><i
                                            class="feather-settings me-2"></i>Profile Setting</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-7 col-md-12">
                            <div class="dash-tabs-block mt-4">
                                <ul class="nav nav-pills nav-fill p-2 dash-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab"
                                           href="#dashboard" role="tab" aria-controls="dashboard"
                                           aria-selected="true"><i class="feather-grid"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="about-tab" data-bs-toggle="tab" href="#about" role="tab"
                                           aria-controls="about" aria-selected="false"><i class="feather-info"></i>About</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                     aria-labelledby="dashboard-tab">
                                    <div class="main-card pb-2 px-2">
                                        <div class="row g-2">
                                            <div class="col-lg-6 col-xl-6 col-md-6 col-12">
                                                <div class="dash-step">
                                                    <i class="feather-calendar"></i>
                                                    <h6 class="dash-step-title">The count of your events</h6>
                                                    <span class="count-1">{{count($events)}}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6 col-md-6 col-12">
                                                <div class="dash-step">
                                                    <i class="feather-star"></i>
                                                    <h6 class="dash-step-title">The count of events you are interested in</h6>
                                                    <span class="count-1">{{ $user->likedEvents->count() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-card mt-4 mb-0">
                                        <div class="events-dash-heading d-flex align-items-center w-100 py-2 pe-2 ps-4">
                                            <h4>Events</h4>
                                            <a href="{{route('user.events.create')}}"
                                               class="main-btn btn-hover h_40 ms-auto">Create</a>
                                        </div>
                                        <div class="all-dash-events">
                                            <div class="row">
                                                @if(count($events) === 0)
                                                    <div class="no-events">
                                                        <div class="no-event-icon">
                                                            <img src="{{asset('/assets/images/icon-calendar.png')}}"
                                                                 alt="">
                                                        </div>
                                                        <span>No events found.</span>
                                                    </div>
                                                @else
                                                    @foreach($events as $event)
                                                        <div class="col-xl-4 col-lg-12 col-md-6 col-12">
                                                            <div class="event-main-post">
                                                                <div class="main-photo">
                                                                    <a href="#">
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
                                                                    <a href="{{route('user.events.show', ['event' =>$event])}}"
                                                                       class="event-title">{{__($event->title)}}</a>
                                                                    <div class="dash-counter-block">
                                                                        <p class="dash-event-counter">
                                                                    <span class="h-color"><i
                                                                            class="feather-map-pin me-2"></i>{{__('City')}}</span>
                                                                            <span
                                                                                class="ms-auto">{{__($event->city->name)}}</span>
                                                                        </p>
                                                                        <p class="dash-event-counter">
                                                                    <span class="h-color"><i
                                                                            class="feather-users me-2"></i>{{__('Meeting time')}}</span>
                                                                            <span
                                                                                class="ms-auto text-end">{{ strftime('%d.%m.%Y at %H:%M', strtotime($event->date . ' ' . $event->time)) }}</span>
                                                                        </p>
                                                                        <p class="dash-event-counter">
                                                                    <span class="h-color"><i
                                                                            class="feather-star me-2"></i>Interested</span>
                                                                            <span class="ms-auto">{{ $event->likedByUsers->count() }}</span>
                                                                        </p>
                                                                        <p class="dash-event-counter">
                                                                    <span class="h-color"><i
                                                                            class="feather-tag me-2"></i>{{__('Category')}}</span>
                                                                            <span
                                                                                class="ms-auto">{{__($event->category->name)}}</span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="group-btns d-flex justify-content-center align-items-center">
                                                                        <a class="main-btn btn-hover h_40" href="{{route('user.events.edit', ['event' => $event])}}">Edit</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                                    <div class="main-card mt-4 mb-0">
                                        <div
                                            class="events-dash-heading d-flex align-items-center w-100 py-2 pe-2 ps-4 border_bottom">
                                            <h4>About</h4>
                                            <a class="main-btn btn-hover h_40 ms-auto" data-bs-toggle="modal"
                                               href="#edit-profile-model" role="button">Edit</a>
                                        </div>
                                        <div class="about-details">
                                            <div class="about-step">
                                                <span>Name</span>
                                                <h4 class="mt-2">{{__($profile->first_name)}} {{__($profile->last_name)}}</h4>
                                            </div>
                                            <div class="about-step">
                                                <span>A little information about you</span>
                                                <h5 class="mb-0 mt-2">{{__($profile->description)}}</h5>
                                            </div>
                                            <div class="about-step">
                                                <span>{{__('Your city')}}</span>
                                                <h5 class="mb-0 mt-2">{{__($profile->city->name)}}</h5>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const coverImgInput = document.getElementById('cover-img');

            coverImgInput.addEventListener('change', function () {
                const form = document.getElementById('cover-img-form');
                form.submit();
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const avatarImgInput = document.getElementById('avatar-img');

            avatarImgInput.addEventListener('change', function () {
                const form = document.getElementById('avatar-img-form');
                form.submit();
            });
        });

        function submitForm() {
            // Найти форму по ее идентификатору
            const form = document.getElementById('edit-profile-form');

            form.submit();
        }
    </script>
@endsection
