@extends('chat_layout.app')

@section('content')
    <style>
        .modal-dialog {
            position: absolute !important;
            left: 0 !important;
            right: 0 !important;
            top: 20px !important;
        }

        /* .chat-leftsidebar{
            height: 100vh;
            background-color: white;
            border: 1px solid grey;
                    } */

    </style>
    <div class="layout-wrapper d-lg-flex">

        <div class="chat-leftsidebar me-lg-1 ms-lg-0">
            <div class="tab-content">
                {{-- <li><span class="label label-info">{{ $user->name }}</span> <a href="javascript:void(0);"
                                class="chat-toggle" data-id="{{ $user->id }}" data-user="{{ $user->name }}">Open
                                chat</a></li> --}}

                <div class="tab-pane fade show active" id="pills-chat" role="tabpanel" aria-labelledby="pills-chat-tab">
                    <!-- Start chats content -->
                    <div class="px-4 pt-4 " style="padding:20px">
                        <div class="float-left">
                            <h4 class="mb-4">Chats</h4>
                        </div>
                        <div class="float-right">


                            <i class="fa fa-plus " data-toggle="modal" data-target="#exampleModalCenter"
                                style="font-size: 16px"></i>
                        </div>
                    </div> <!-- .p-4 -->
                    <hr>

                    <div class="mt-5">

                        @foreach ($messages as $message)
                            <div class="px-2">
                                <div class="chat-message-list" data-simplebar style="height: 100px">
                                    <ul class="list-unstyled chat-list chat-user-list">
                                        <li class="active">
                                            <a href="javascript:void(0);" class="chat-toggle"
                                                data-id="{{ $message->user->id }}"
                                                data-user="{{ $message->toUser->name }}">
                                                <div class="d-flex">
                                                    <div class="chat-user-img online align-self-center me-3 ms-0">
                                                        <img src="{{ url($message->toUser->profilePicture->image ?? 'image/user-avatar.png') }}"
                                                            class="rounded-circle avatar-xs" alt="">
                                                        {{-- <img src="{{ url('chat/assets/images/users/avatar-4.jpg') }}"
                                                        class="rounded-circle avatar-xs" alt=""> --}}

                                                    </div>
                                                    <div class="flex-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-15 mb-1">
                                                            {{ $message->toUser->id == Auth::id() ? $message->fromUser->name : $message->toUser->name }}
                                                        </h5>
                                                        <p class="chat-user-message text-truncate mb-0">
                                                            {{ $message->content }}</p>
                                                    </div>
                                                    <div class="font-size-11">
                                                        {{ $message->created_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                        <!-- End chat-message-list -->
                    </div>
                    <!-- Start chats content -->
                </div>
            </div>
            <!-- end tab content -->

        </div>



        <div class="user-chat w-100 overflow-hidden">
            <div class="d-lg-flex">
                <!-- start chat conversation section -->
                <div class="w-100 overflow-hidden position-relative">
                    <div class="p-3 p-lg-4 border-bottom user-chat-topbar">
                        <div class="row align-items-center">
                            <div class="col-sm-4 col-8">
                                <div class="d-flex align-items-center">
                                    <div class="d-block d-lg-none me-2 ms-0">
                                        <a href="javascript: void(0);"
                                            class="user-chat-remove text-muted font-size-16 p-2"><i
                                                class="ri-arrow-left-s-line"></i></a>
                                    </div>
                                    <div class="me-3 ms-0">
                                        <img src="{{ url('chat/assets/images/users/avatar-4.jpg') }}"
                                            class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-0 text-truncate">
                                            <a href="#" class="text-reset user-profile-show" id="toUserName">Doris Brown</a>
                                            <i
                                                class="ri-record-circle-fill font-size-10 text-success d-inline-block ms-1"></i>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-8 col-4">
                        <ul class="list-inline user-chat-nav text-end mb-0">                                        
                           

                            <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                                <button type="button" class="btn nav-btn" data-bs-toggle="modal" data-bs-target="#audiocallModal">
                                    <i class="ri-phone-line"></i>
                                </button>
                            </li>


                        </ul>                                    
                    </div> --}}
                        </div>
                    </div>
                    <!-- end chat user head -->

                    <!-- start chat conversation -->
                    <div class="chat-conversation p-3 p-lg-4" data-simplebar="init">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <div class="conversation-list">
                                    <div class="chat-avatar">
                                        <img src="{{ url('chat/assets/images/users/avatar-4.jpg') }}" alt="">
                                    </div>

                                    <div class="user-chat-content">
                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    Good morning
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:00</span>
                                                </p>
                                            </div>

                                        </div>
                                        <div class="conversation-name">Doris Brown</div>
                                    </div>
                                </div>
                            </li>

                            <li class="right">
                                <div class="conversation-list">
                                    <div class="chat-avatar">
                                        <img src="{{ url('chat/assets/images/users/avatar-1.jpg') }}" alt="">
                                    </div>

                                    <div class="user-chat-content">
                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    Good morning, How are you? What about our next meeting?
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:02</span>
                                                </p>
                                            </div>


                                        </div>

                                        <div class="conversation-name">Patricia Smith</div>
                                    </div>
                                </div>
                            </li>

                            {{-- <li> 
                        <div class="chat-day-title">
                            <span class="title">Today</span>
                        </div>
                    </li> --}}

                            <li>
                                <div class="conversation-list">
                                    <div class="chat-avatar">
                                        <img src="{{ url('chat/assets/images/users/avatar-4.jpg') }}" alt="">
                                    </div>

                                    <div class="user-chat-content">

                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    Yeah everything is fine
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:05</span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    & Next meeting tomorrow 10.00AM
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:05</span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="conversation-name">Doris Brown</div>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <div class="conversation-list">
                                    <div class="chat-avatar">
                                        <img src="{{ url('chat/assets/images/users/avatar-4.jpg') }}" alt="">
                                    </div>

                                    <div class="user-chat-content">

                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    Yeah everything is fine
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:05</span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    & Next meeting tomorrow 10.00AM
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:05</span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="conversation-name">Doris Brown</div>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <div class="conversation-list">
                                    <div class="chat-avatar">
                                        <img src="{{ url('chat/assets/images/users/avatar-4.jpg') }}" alt="">
                                    </div>

                                    <div class="user-chat-content">

                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    Yeah everything is fine
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:05</span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    & Next meeting tomorrow 10.00AM
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:05</span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="conversation-name">Doris Brown</div>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <div class="conversation-list">
                                    <div class="chat-avatar">
                                        <img src="{{ url('chat/assets/images/users/avatar-4.jpg') }}" alt="">
                                    </div>

                                    <div class="user-chat-content">

                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    Yeah everything is fine
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:05</span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    & Next meeting tomorrow 10.00AM
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:05</span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="conversation-name">Doris Brown</div>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <div class="conversation-list">
                                    <div class="chat-avatar">
                                        <img src="{{ url('chat/assets/images/users/avatar-4.jpg') }}" alt="">
                                    </div>

                                    <div class="user-chat-content">

                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    Yeah everything is fine
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:05</span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    & Next meeting tomorrow 10.00AM
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:05</span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="conversation-name">Doris Brown</div>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <div class="conversation-list">
                                    <div class="chat-avatar">
                                        <img src="{{ url('chat/assets/images/users/avatar-4.jpg') }}" alt="">
                                    </div>

                                    <div class="user-chat-content">

                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    Yeah everything is fine
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:05</span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    & Next meeting tomorrow 10.00AM
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:05</span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="conversation-name">Doris Brown</div>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <div class="conversation-list">
                                    <div class="chat-avatar">
                                        <img src="{{ url('chat/assets/images/users/avatar-4.jpg') }}" alt="">
                                    </div>

                                    <div class="user-chat-content">

                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    Yeah everything is fine
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:05</span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    & Next meeting tomorrow 10.00AM
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:05</span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="conversation-name">Doris Brown</div>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <div class="conversation-list">
                                    <div class="chat-avatar">
                                        <img src="{{ url('chat/assets/images/users/avatar-4.jpg') }}" alt="">
                                    </div>

                                    <div class="user-chat-content">

                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    Yeah everything is fine
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:05</span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">
                                                    & Next meeting tomorrow 10.00AM
                                                </p>
                                                <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">10:05</span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="conversation-name">Doris Brown</div>
                                    </div>

                                </div>
                            </li>



                            {{-- <li>
                        <div class="conversation-list">
                            <div class="chat-avatar">
                                <img src="{{url('chat/assets/images/users/avatar-4.jpg')}}" alt="">
                            </div>
                            
                            <div class="user-chat-content">
                                <div class="ctext-wrap">
                                    <div class="ctext-wrap-content">
                                        <p class="mb-0">
                                            typing
                                            <span class="animate-typing">
                                                <span class="dot"></span>
                                                <span class="dot"></span>
                                                <span class="dot"></span>
                                            </span>
                                        </p>
                                    </div>
                                </div>

                                <div class="conversation-name">Doris Brown</div>
                            </div>
                            
                        </div>
                    </li> --}}

                        </ul>
                    </div>
                    <!-- end chat conversation end -->

                    <!-- start chat input section -->
                    <div class="chat-input-section p-3 p-lg-4 border-top mb-0">

                        <div class="row g-0">

                            <div class="col">
                                <input type="text" class="form-control form-control-lg bg-light border-light"
                                    placeholder="Enter Message...">
                            </div>
                            <div class="col-auto">
                                <div class="chat-input-links ms-md-2 me-md-0">
                                    <ul class="list-inline mb-0">
                                        {{-- <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Emoji">
                                    <button type="button" class="btn btn-link text-decoration-none font-size-16 btn-lg waves-effect">
                                        <i class="ri-emotion-happy-line"></i>
                                    </button>
                                </li> --}}
                                        {{-- <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Attached File">  
                                    <button type="button" class="btn btn-link text-decoration-none font-size-16 btn-lg waves-effect">
                                        <i class="ri-attachment-line"></i>
                                    </button>
                                </li> --}}
                                        <li class="list-inline-item">
                                            <button type="submit"
                                                class="btn btn-primary font-size-16 btn-lg chat-send waves-effect waves-light">
                                                <i class="ri-send-plane-2-fill"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end chat input section -->
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->





    @include('chat_layout.chat-box')

    <input type="hidden" id="current_user" value="{{ \Auth::user()->id }}" />
    <input type="hidden" id="pusher_app_key" value="{{ env('PUSHER_APP_KEY') }}" />
    <input type="hidden" id="pusher_cluster" value="{{ env('PUSHER_APP_CLUSTER') }}" />

    <!-- Modal -->
    <div class="modal " id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Start a conversation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mt-3">
                        <div class="d-flex    headerSearchBColor ">
                            <img class="img-fluid ml-2 mr-2 " src="{{ url('assets/images/icons/searechIcon.png') }}"
                                alt="search">
                            <input class="" id="searchss" name="search" type="text" placeholder="Search">

                        </div>
                    </div>
                    <div class="searchUserChatResult"></div>
                    {{-- <ul>
                        @foreach ($followingUser as $following)
                            <a href="javascript:void(0);" class="chat-toggle" data-id="{{$following->followingUser->id }}"
                                data-user="{{ $following->followingUser->name }}">
                                <li>{{ $following->followingUser->name }}</li>
                            </a>
                        @endforeach

                    </ul> --}}
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>
@stop

@section('script')

    <script>
        $('#searchss').on('keyup', function() {
            var text = $('#searchss').val();
            if (text == '')
                $('.searchUserChatResult').addClass('d-none');
            else
                $('.searchUserChatResult').removeClass('d-none');
            if (text.length >= 3) {
                $.ajax({
                    type: "GET",
                    url: '/search',
                    data: {
                        text: text,
                    },
                    success: function(data) {
                        $('.searchUserChatResult').html("");
                        if (data[0].profile_picture !== null)
                            var img =
                                "<img class='circularImage pic mr-3' src=" + data[0]
                                .profile_picture.image + " />"
                        else
                            var img =
                                "<img class='circularImage pic mr-3 mb-3' src='{{ asset('assets/images/usersImages/userPlaceHolder.png') }}' />"
                        if (data.length == 0)
                            $('.searchUserChatResult').append(
                                '<div class="w-100 justify-content-center " style="background:white;padding:20px">No Result Found</div>'
                            );
                        $.each(data, function(key, value) {
                            var url = "{{ url('profile') }}" + "/" + value.id;

                            $('.searchUserChatResult').append(
                                '<a href="javascript:void(0);" class="chat-toggle"  data-id="' +
                                value.id + '" data-user="' + value.name +
                                '" > <div class="w-100  justify-content-center " style="background:white">' +
                                img + value
                                .name + '<hr></div> </a>');
                        })
                    }
                }).done(function() {})
            }
        });
    </script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script src="{{ asset('js/chat.js') }}"></script>



@stop
