@extends('layouts.main')

@section('content')
    <div class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="title-bar-text">
                        <li class="breadcrumb-item"><a href="{{route('user.events.index')}}">Main</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Creating an event</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <main class="goeveni-mp">
        <div class="main-section">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-xl-6 col-lg-10 col-md-12">
                        <form action="{{route('user.events.store')}}"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="main-card p-4">
                                <div class="main_full">
                                    <div class="panel">
                                        <div class="button_outer">
                                            <div class="btn_upload">
                                                <input type="file" id="upload_file" name="photo">
                                                Upload Image
                                            </div>
                                            <div class="processing_bar"></div>
                                            <div class="success_box"></div>
                                        </div>
                                    </div>
                                    <div class="error_msg">
                                        @foreach($errors->get('photo') as $error)
                                            <span style="color: red">{{$error}}</span><br>
                                        @endforeach
                                    </div>
                                    <div class="uploaded_file_view" id="uploaded_view">
                                        <span class="file_remove">X</span>
                                    </div>
                                </div>
                            </div>
                            <div class="add-event-tabs">
                                <div class="tab-content" id="mainTabContent">
                                    <div class="tab-pane fade show active" id="in-person" role="tabpanel"
                                         aria-labelledby="in-person-tab">
                                        <div class="main-form">
                                            <div class="form-group mt-4">
                                                <label class="form-label">Event Name*</label>
                                                <input class="form-input" type="text" placeholder="Enter Event name"
                                                       name="title" value="{{old('title')}}">
                                                @foreach($errors->get('title') as $error)
                                                    <span style="color: red">{{$error}}</span><br>
                                                @endforeach
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group mt-3">
                                                        <label class="form-label">Start Date*</label>
                                                        <input class="search-form-input datepicker-here"
                                                               data-language='en' type="text" placeholder="Select Date"
                                                               name="date" value="{{old('date')}}">
                                                        @foreach($errors->get('date') as $error)
                                                            <span style="color: red">{{$error}}</span><br>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group mt-3 clock-icon">
                                                        <label class="form-label">Start Time*</label>
                                                        <select class="selectpicker" data-size="5"
                                                                data-live-search="true" name="time">
                                                            @php
                                                                $start = strtotime('00:00');
                                                                $end = strtotime('23:59');
                                                                $interval = 10 * 60;
                                                            @endphp

                                                            @for ($time = $start; $time <= $end; $time += $interval)
                                                                @php
                                                                    $formattedTime = date('H:i', $time);
                                                                @endphp
                                                                <option
                                                                    value="{{$formattedTime}}">{{$formattedTime}}</option>
                                                            @endfor
                                                        </select>
                                                        @foreach($errors->get('time') as $error)
                                                            <span style="color: red">{{$error}}</span><br>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label class="form-label">Category*</label>
                                                <select class="selectpicker" data-width="100%" data-size="5"
                                                        data-live-search="true" name="category">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" @selected(old('category') ==
                                                        $category->id)>
                                                        {{$category->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @foreach($errors->get('category') as $error)
                                                    <span style="color: red">{{$error}}</span><br>
                                                @endforeach
                                            </div>
                                            <div class="form-group mt-4">
                                                <label class="form-label">Location*</label>
                                                <div class="position-relative">
                                                    <select class="selectpicker" data-width="100%" data-size="5"
                                                            data-live-search="true" name="city">
                                                        @foreach($cities as $city)
                                                            <option value="{{$city->id}}" @selected(old('city') ==
                                                            $city->id)>
                                                            {{$city->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @foreach($errors->get('city') as $error)
                                                        <span style="color: red">{{$error}}</span><br>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label class="form-label">Description*</label>
                                                <textarea class="form-textarea" placeholder="Description"
                                                          name="description">{{old('description')}}</textarea>
                                                @foreach($errors->get('description') as $error)
                                                    <span style="color: red">{{$error}}</span><br>
                                                @endforeach
                                                <span class="small-des">Provide more information about your event so that guests know what to expect.</span>
                                            </div>
                                            <button class="main-btn btn-hover h-40 w-100 mt-37 mb-3">Create Event
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
