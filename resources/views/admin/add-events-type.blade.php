@extends('admin.layout')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

@section('title')
    Add Event Types
@endsection
@section('content')

    <div class="page-content-wrapper ">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-200">
                    <div class="card-body">
                        <p class="text-muted m-b-30 font-14"></p>
                        <form class="" action="{{ url('addEventTypes') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Enter Event Type </strong>
                                        </label>
                                        <input type="text" class="form-control" name="type" placeholder="" required>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div>
                                    <button type="submit" style="border: none"
                                        class="btn btn-warning bg-primary waves-effect waves-light">
                                        Submit
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">All Event Types </h4>
                        <p class="text-muted m-b-30 font-14"></p>
                        <table id="myTable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($eventTypes as $key => $type)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $type->type }}</td>
                                        @if ($type->is_active == '1')
                                            <td><span class="badge badge-success">Active</span></td>
                                        @else
                                            <td><span class="badge badge-default">Deactive</span></td>

                                        @endif


                                        <td> <a href="{{ url('/deleteEventType/' . $type->id) }}"><i class="fa fa-trash "
                                                    style="color: red"></i></a> </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
