@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin mb-3">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Events</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-sm-center">
                            <a href="{{route('admin.events.create')}}" class="btn btn-outline-success btn-fw mx-auto">Add a new event</a>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Author
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        City
                                    </th>
                                    <th>
                                        Time of the event
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td>
                                            {{$event->id}}
                                        </td>
                                        <td>
                                            {{$event->title}}
                                        </td>
                                        <td>
                                            {{$event->user->profile->first_name." ".$event->user->profile->last_name}}
                                        </td>
                                        <td>
                                            {{$event->category->name}}
                                        </td>
                                        <td>
                                            {{$event->city->name}}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($event->date.' '.$event->time)->format('d.m.Y H:i') }}
                                        </td>
                                        <td>
                                            <div class="row d-flex justify-content-around">
                                                <a href="{{ route('admin.events.show', ['event' => $event]) }}"
                                                   class="btn btn-inverse-info btn-fw">Info</a>
                                                <a href="{{ route('admin.events.edit', ['event' => $event]) }}"
                                                   class="btn btn-inverse-primary btn-fw">Edit
                                                </a>
                                                <div>
                                                    <form action="{{ route('admin.events.destroy', ['event' => $event]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-inverse-danger btn-fw">Delete</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="px-5 mt-5">
                                {{ $events->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
