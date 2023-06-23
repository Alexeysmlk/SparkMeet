@extends('layouts.main')

@section('content')
<!-- Title Bar Start -->
<div class="title-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="title-bar-text">
                    <li class="breadcrumb-item"><a href="{{route('user.events.index')}}">Main</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Setting</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Title Bar End -->
<!-- Body Start -->
<main class="discussion-mp">
    <div class="main-section">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-4 col-md-12">
                    <div class="main-card">
                        <div class="setting-tabs">
                            <ul class="nav nav-pills nav-fill p-2 setting-tab" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="email-setting-tab" data-bs-toggle="tab" href="#email-setting" role="tab" aria-controls="email-setting" aria-selected="false"><i class="feather-mail me-3"></i>Change Email</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="password-setting-tab" data-bs-toggle="tab" href="#password-setting" role="tab" aria-controls="password-setting" aria-selected="false"><i class="feather-lock me-3"></i>Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="delete-setting-tab" data-bs-toggle="tab" href="#delete-setting" role="tab" aria-controls="delete-setting" aria-selected="true"><i class="feather-trash-2 me-3"></i>Deactivate Account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="email-setting" role="tabpanel" aria-labelledby="email-setting-tab">
                            <div class="main-card">
                                <div class="categories-left-heading border_bottom">
                                    <h3>Email Setting</h3>
                                </div>
                                <div class="setting-area">
                                    <form method="POST" action="{{ route('user.user.updateEmail') }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label class="form-label">Old Email Address*</label>
                                            <input class="form-input" type="email" name="old_email" placeholder="Enter Old Email Address" required>
                                            @foreach($errors->get('old_email') as $error)
                                                <span style="color: red">{{$error}}</span><br>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">New Email Address*</label>
                                            <input class="form-input" type="email" name="new_email" placeholder="Enter New Email Address" required>
                                            @foreach($errors->get('new_email') as $error)
                                                <span style="color: red">{{$error}}</span><br>
                                            @endforeach
                                        </div>
                                        <div class="add-profile-btn">
                                            <button class="setting-save-btn" type="submit">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="password-setting" role="tabpanel" aria-labelledby="password-setting-tab">
                            <div class="main-card">
                                <div class="categories-left-heading border_bottom">
                                    <h3>Change Password</h3>
                                </div>
                                <div class="setting-area">
                                    <form method="POST" action="{{ route('user.user.updatePassword') }}">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label">Old Password*</label>
                                            <input class="form-input" type="password" name="old_password" placeholder="Enter Old Password" required>
                                            @foreach($errors->get('old_password') as $error)
                                                <span style="color: red">{{$error}}</span><br>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">New Password*</label>
                                            <input class="form-input" type="password" name="new_password" placeholder="Enter New Password" required>
                                            @foreach($errors->get('new_password') as $error)
                                                <span style="color: red">{{$error}}</span><br>
                                            @endforeach
                                        </div>
                                        <div class="add-profile-btn">
                                            <button class="setting-save-btn" type="submit">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="delete-setting" role="tabpanel" aria-labelledby="delete-setting-tab">
                            <div class="main-card">
                                <div class="categories-left-heading border_bottom">
                                    <h3>Deactivate Account</h3>
                                </div>
                                <div class="setting-area">
                                    <form method="POST" action="{{ route('user.user.deleteAccount') }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="form-group">
                                            <label class="form-label">Email*</label>
                                            <input class="form-input" type="email" name="email" placeholder="Enter Email Address" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Password*</label>
                                            <input class="form-input" type="password" name="password" placeholder="Enter Password" required>
                                        </div>
                                        <div class="add-profile-btn">
                                            <button class="setting-save-btn" type="submit">Deactivate Account</button>
                                        </div>
                                    </form>
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
