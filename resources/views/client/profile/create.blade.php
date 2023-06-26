@extends('layouts.start')

@section('content')
    <div class="title-bar mt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="title-bar-text">
                        <li class="breadcrumb-item"><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Main') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form></li>
                        <li class="breadcrumb-item active" aria-current="page">Creating an account</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <main class="discussion-mp">
        <div class="main-section">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="main-card">
                            <div class="categories-left-heading border_bottom">
                                <h2 class="mb-4"><img src="{{asset('/assets/images/logo-2.svg')}}">
                                    Welcome to SparkMeet!
                                </h2>
                                <p class="">We are glad to see you here!</p>
                                <p>Tell us more about yourself, please</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="main-card">
                            <div class="categories-left-heading">
                                <form action="{{route('user.profile.store')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mt-0">
                                                <label class="form-label">First name *</label>
                                                <input class="form-input" type="text"
                                                       placeholder="{{__('Enter your first name')}}"
                                                       name="first_name" value="{{old('last_name')}}">
                                                @foreach($errors->get('first_name') as $error)
                                                    <span style="color: red">{{$error}}</span><br>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-0">
                                                <label class="form-label">Second name *</label>
                                                <input class="form-input" type="text"
                                                       placeholder="{{__('Enter your second name')}}"
                                                       name="last_name" value="{{old('last_name')}}">
                                                @foreach($errors->get('last_name') as $error)
                                                    <span style="color: red">{{$error}}</span><br>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">City *</label>
                                        <select class="selectpicker" data-width="100%" data-size="5"
                                                data-live-search="true" name="city_id">
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                        @foreach($errors->get('city_id') as $error)
                                            <span style="color: red">{{$error}}</span><br>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Tell about yourself (optional)</label>
                                        <textarea class="form-textarea" placeholder="Description"
                                                  name="description">{{old('description')}}</textarea>
                                        @foreach($errors->get('description') as $error)
                                            <span style="color: red">{{$error}}</span><br>
                                        @endforeach
                                        <span class="small-des">Provide more information about yourself so that other users can get to know you</span>
                                    </div>
                                    <div class="add-crdt-amnt mt-4">
                                        <button class="main-btn btn-hover h_50 w-100">Save profile
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
