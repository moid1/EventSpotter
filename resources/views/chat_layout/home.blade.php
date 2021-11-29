@extends('chat_layout.app')

@section('content')
    <div class="chat-leftsidebar me-lg-1 ms-lg-0">
        <div class="tab-content">
            {{-- <li><span class="label label-info">{{ $user->name }}</span> <a href="javascript:void(0);"
                                class="chat-toggle" data-id="{{ $user->id }}" data-user="{{ $user->name }}">Open
                                chat</a></li> --}}

            <div class="tab-pane fade show active" id="pills-chat" role="tabpanel" aria-labelledby="pills-chat-tab">
                <!-- Start chats content -->
                <div>
                    <div class="px-4 pt-4">
                        <h4 class="mb-4">Chats</h4>
                    </div> <!-- .p-4 -->
                    @foreach ($messages as $message)
                        <div class="px-2">
                            <div class="chat-message-list" data-simplebar style="height: 100px">
                                <ul class="list-unstyled chat-list chat-user-list">
                                    <li class="active">
                                        <a href="javascript:void(0);" class="chat-toggle"
                                            data-id="{{ $message->user->id }}" data-user="{{ $message->toUser->name }}">
                                            <div class="d-flex">
                                                <div class="chat-user-img online align-self-center me-3 ms-0">
                                                    <img src="{{ url($message->toUser->profilePicture->image ?? 'chat/assets/images/users/avatar-4.jpg') }}"
                                                        class="rounded-circle avatar-xs" alt="">
                                                    {{-- <img src="{{ url('chat/assets/images/users/avatar-4.jpg') }}"
                                                        class="rounded-circle avatar-xs" alt=""> --}}

                                                </div>
                                                <div class="flex-1 overflow-hidden">
                                                    <h5 class="text-truncate font-size-15 mb-1">{{ $message->toUser->name }}
                                                    </h5>
                                                    <p class="chat-user-message text-truncate mb-0">{{ $message->content }}</p>
                                                </div>
                                                <div class="font-size-11">{{ $message->created_at->diffForHumans() }}</div>
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


    @include('chat_layout.chat-box')

    <input type="hidden" id="current_user" value="{{ \Auth::user()->id }}" />
    <input type="hidden" id="pusher_app_key" value="{{ env('PUSHER_APP_KEY') }}" />
    <input type="hidden" id="pusher_cluster" value="{{ env('PUSHER_APP_CLUSTER') }}" />
@stop

@section('script')
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script src="{{ asset('js/chat.js') }}"></script>

@stop
