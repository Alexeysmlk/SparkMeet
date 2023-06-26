@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin mb-3">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Creating a new tag</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.tags.store')}}"
                              method="post">
                            @csrf
                            <div class="add-event-tabs">
                                <div class="tab-content" id="mainTabContent">
                                    <div class="tab-pane fade show active" id="in-person" role="tabpanel"
                                         aria-labelledby="in-person-tab">
                                        <div class="main-form">
                                            <div class="form-group mt-4">
                                                <label class="form-label">Tag Name *</label>
                                                <input class="form-input" type="text" placeholder="Enter Tag Name"
                                                       name="name" value="{{old('name')}}">
                                                @foreach($errors->get('name') as $error)
                                                    <span style="color: red">{{$error}}</span><br>
                                                @endforeach
                                            </div>
                                            <button class="main-btn btn-hover h-40 w-100 mt-37 mb-3">Create tag
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
