@extends('admin.layout')
@section('title')
    Today Events
@endsection
@section('content')
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="page-content-wrapper ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Today Events </h4>
                                    <p class="text-muted m-b-30 font-14"></p>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Event Name</th>
                                                <th>Event Description</th>
                                                <th>Event Type</th>
                                                <th>Created By</th>
                                                <th>Created Date</th>

                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($todayEvents as $key => $event)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $event->event_name }}</td>
                                                    <td>{{\Illuminate\Support\Str::limit($event->event_description,50,$end='...Î')}}</td>
                                                    <th>{{ $event->event_type }}</th>
                                                    <td>{{ $event->user->name }}</td>
                                                    <td>{{ $event->created_at->toDateString() }}</td>
                                                    {{-- <td><img src="{{asset($user->image)}}" width="50" height="50" />
                                                <style>
                                                    img {
                                                        border: ;
                                                    }
                                                </style>
                                            </td> --}}
                                                    {{-- <td>
                                                @if ($user->assment_status == '0') 
                                                <a href="{{route('approve_test',$user->id)}}" class="btn btn-danger btn-xs">Approve</a>

                                                @else
                                                <a href="{{route('unapprove_test',$user->id)}}" class="btn btn-success btn-xs">UnApprove</a>
                                                @endif
                                            </td> --}}


                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
