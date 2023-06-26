@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin mb-3">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Creating a new category</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.categories.store')}}"
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
                                                <label class="form-label">Category Name *</label>
                                                <input class="form-input" type="text" placeholder="Enter category name"
                                                       name="name" value="{{old('name')}}">
                                                @foreach($errors->get('name') as $error)
                                                    <span style="color: red">{{$error}}</span><br>
                                                @endforeach
                                            </div>
                                            <button class="main-btn btn-hover h-40 w-100 mt-37 mb-3">Create Category
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
    </div>

@endsection
