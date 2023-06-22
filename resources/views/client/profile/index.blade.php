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
                                               accept="image/*">
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
                                                   accept="image/*">
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
                                    <a href="setting.html"
                                       class="co-main-btn co-btn-width min-width d-inline-block h_40"><i
                                            class="feather-settings me-2"></i>Profile Setting</a>
                                </div>
                                <div class="profile-social-link">
                                    <h6>Find me on</h6>
                                    <div class="social-links">
                                        <a href="#" class="social-link" data-bs-toggle="tooltip" data-bs-placement="top"
                                           title="" data-bs-original-title="Facebook" aria-label="Facebook"><i
                                                class="fab fa-facebook-square"></i></a>
                                        <a href="#" class="social-link" data-bs-toggle="tooltip" data-bs-placement="top"
                                           title="" data-bs-original-title="Instagram" aria-label="Instagram"><i
                                                class="fab fa-instagram"></i></a>
                                        <a href="#" class="social-link" data-bs-toggle="tooltip" data-bs-placement="top"
                                           title="" data-bs-original-title="Twitter" aria-label="Twitter"><i
                                                class="fab fa-twitter"></i></a>
                                        <a href="#" class="social-link" data-bs-toggle="tooltip" data-bs-placement="top"
                                           title="" data-bs-original-title="LinkedIn" aria-label="LinkedIn"><i
                                                class="fab fa-linkedin-in"></i></a>
                                        <a href="#" class="social-link" data-bs-toggle="tooltip" data-bs-placement="top"
                                           title="" data-bs-original-title="Youtube" aria-label="Youtube"><i
                                                class="fab fa-youtube"></i></a>
                                        <a href="#" class="social-link" data-bs-toggle="tooltip" data-bs-placement="top"
                                           title="" data-bs-original-title="Website" aria-label="Website"><i
                                                class="fa-solid fa-globe"></i></a>
                                    </div>
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
                                                    <h6 class="dash-step-title">Count of your events</h6>
                                                    <span class="count-1">{{count($events)}}</span>
                                                    <span class="count-2">+1 last 30 days</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6 col-md-6 col-12">
                                                <div class="dash-step">
                                                    <i class="feather-star"></i>
                                                    <h6 class="dash-step-title">Response</h6>
                                                    <span class="count-1">18</span>
                                                    <span class="count-2">+15 last 30 days</span>
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
                                                                            <span class="ms-auto">122</span>
                                                                        </p>
                                                                        <p class="dash-event-counter">
                                                                    <span class="h-color"><i
                                                                            class="feather-tag me-2"></i>{{__('Category')}}</span>
                                                                            <span
                                                                                class="ms-auto">{{__($event->category->name)}}</span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="group-btns">
                                                                        <button class="interest-btn btn-hover w-100"><i
                                                                                class="feather-edit me-2"></i>Edit
                                                                        </button>
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
                                                <h5>Find me on</h5>
                                                <div class="social-links">
                                                    <a href="#" class="social-link" data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title=""
                                                       data-bs-original-title="Facebook" aria-label="Facebook"><i
                                                            class="fab fa-facebook-square"></i></a>
                                                    <a href="#" class="social-link" data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title=""
                                                       data-bs-original-title="Instagram" aria-label="Instagram"><i
                                                            class="fab fa-instagram"></i></a>
                                                    <a href="#" class="social-link" data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="" data-bs-original-title="Twitter"
                                                       aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                                                    <a href="#" class="social-link" data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title=""
                                                       data-bs-original-title="LinkedIn" aria-label="LinkedIn"><i
                                                            class="fab fa-linkedin-in"></i></a>
                                                    <a href="#" class="social-link" data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="" data-bs-original-title="Youtube"
                                                       aria-label="Youtube"><i class="fab fa-youtube"></i></a>
                                                    <a href="#" class="social-link" data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="" data-bs-original-title="Website"
                                                       aria-label="Website"><i class="fa-solid fa-globe"></i></a>
                                                </div>
                                            </div>
                                            <div class="about-step">
                                                <span>{{__('Your city')}}</span>
                                                <h5 class="mb-0 mt-2">{{__($profile->city->name)}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fde" id="discussion" role="tabpanel"
                                     aria-labelledby="discussion-tab">
                                    <div class="main-card mt-4 mb-0">
                                        <div
                                            class="events-dash-heading d-flex align-items-center w-100 py-2 pe-2 ps-4 border_bottom">
                                            <h4>All Discussions</h4>
                                            <a class="main-btn btn-hover h_40 ms-auto" data-bs-toggle="modal"
                                               href="#add-discussion-model" role="button">Add Topic</a>
                                        </div>
                                        <div class="my-all-discussions">
                                            <div class="dis-item">
                                                <div class="row no-gutters">
                                                    <div class="col-xl-8 col-lg-12 col-md-12">
                                                        <div class="dis-img-text">
                                                            <img src="/assets/images/discussion/img-1.jpg" alt="">
                                                            <a href="single_discussion_view.html"><h4>Lorem ipsum dolor
                                                                    sit amet, consectetur adipiscing elit.</h4></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-12 col-md-12">
                                                        <ul class="dis-reviews">
                                                            <li>
                                                                <a href="#">5 h</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">3k views</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">5 replies</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dis-item">
                                                <div class="row no-gutters">
                                                    <div class="col-xl-8 col-lg-12 col-md-12">
                                                        <div class="dis-img-text">
                                                            <img src="/assets/images/discussion/img-1.jpg" alt="">
                                                            <a href="single_discussion_view.html"><h4>ellentesque vitae
                                                                    metus at neque cursus finibus.</h4></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-12 col-md-12">
                                                        <ul class="dis-reviews">
                                                            <li>
                                                                <a href="#">6 h</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">6k views</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">10 replies</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dis-item">
                                                <div class="row no-gutters">
                                                    <div class="col-xl-8 col-lg-12 col-md-12">
                                                        <div class="dis-img-text">
                                                            <img src="/assets/images/discussion/img-1.jpg" alt="">
                                                            <a href="single_discussion_view.html"><h4>Cras vel lorem
                                                                    gravida, ullamcorper mi sed.</h4></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-12 col-md-12">
                                                        <ul class="dis-reviews">
                                                            <li>
                                                                <a href="#">6 h</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">7k views</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">15 replies</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dis-item">
                                                <div class="row no-gutters">
                                                    <div class="col-xl-8 col-lg-12 col-md-12">
                                                        <div class="dis-img-text">
                                                            <img src="/assets/images/discussion/img-1.jpg" alt="">
                                                            <a href="single_discussion_view.html"><h4>Obortis risus.
                                                                    Nunc egestas arcu sit amet blandit finibus.</h4></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-12 col-md-12">
                                                        <ul class="dis-reviews">
                                                            <li>
                                                                <a href="#">7 h</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">10k views</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">50 replies</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dis-item">
                                                <div class="row no-gutters">
                                                    <div class="col-xl-8 col-lg-12 col-md-12">
                                                        <div class="dis-img-text">
                                                            <img src="/assets/images/discussion/img-1.jpg" alt="">
                                                            <a href="single_discussion_view.html"><h4>Quisque in purus
                                                                    ut velit facilisis consequat ac id eros. </h4></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-12 col-md-12">
                                                        <ul class="dis-reviews">
                                                            <li>
                                                                <a href="#">7 h</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">7.5k views</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">48 replies</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dis-item">
                                                <div class="row no-gutters">
                                                    <div class="col-xl-8 col-lg-12 col-md-12">
                                                        <div class="dis-img-text">
                                                            <img src="/assets/images/discussion/img-1.jpg" alt="">
                                                            <a href="single_discussion_view.html"><h4>Pellentesque
                                                                    semper urna est, non egestas massa vestibulum
                                                                    a.</h4></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-12 col-md-12">
                                                        <ul class="dis-reviews">
                                                            <li>
                                                                <a href="#">8 h</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">8k views</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">60 replies</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dis-item">
                                                <div class="row no-gutters">
                                                    <div class="col-xl-8 col-lg-12 col-md-12">
                                                        <div class="dis-img-text">
                                                            <img src="/assets/images/discussion/img-1.jpg" alt="">
                                                            <a href="single_discussion_view.html"><h4>Nunc maximus
                                                                    mauris non tincidunt tincidunt.</h4></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-12 col-md-12">
                                                        <ul class="dis-reviews">
                                                            <li>
                                                                <a href="#">9 h</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">8.2k views</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">52 replies</a>
                                                            </li>
                                                        </ul>
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
