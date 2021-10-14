@include('layouts.head')

<body>
    @include('front.header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3  float-left">
                <div class="sidebar ">
                    <div>
                        <i class="fa fa-location-arrow mr-3 ml-3" aria-hidden="true"></i>
                        <a class="side_tag" href="index.html">Explore events</a>
                    </div>
                    <hr>
                    <div>
                        <i class="fa fa-calendar mr-3 ml-3" aria-hidden="true"></i>
                        <a class="side_tag" href="your_event.html">Your events</a>
                    </div>
                    <hr>
                    <div>
                        <i class="fa fa-heart mr-3 ml-3" aria-hidden="true"></i>
                        <a class="side_tag" href="favourit.html"> Favorite events</a>
                    </div>
                    <hr>
                    <div class="sideBarActive active  align-items-center d-flex">
                        <i class="fa fa-user-plus mr-3 ml-3" aria-hidden="true"></i>
                        <a class="side_tag" href="#">Followers</a>
                    </div>
                    <hr>
                    <div class=" align-items-center d-flex">
                        <i class="fa fa-user mr-3 ml-3" aria-hidden="true"></i>
                        <a class="side_tag" href="{{ url('/following') }}">Following</a>
                    </div>
                    <hr>
                    <div>
                        <i class="fa fa-calendar-check-o mr-3 ml-3" aria-hidden="true"></i>
                        <a class="side_tag" href="events_your.html">Event you attended</a>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-md-6">
                {{-- pending Request --}}
                @if (count($pendingRequest) > 0)
                    <div class="followers ">
                        <div class="title">Pending Follow Requests</div>
                        @foreach ($pendingRequest as $request)
                            <div class=" pendingRequests d-flex  justify-content-between">
                                <div class="d-flex align-items-center ml-2">
                                    @if ($request->user->profilePicture)
                                        <img class="circularImage"
                                            src="{{ asset($request->user->profilePicture->image) }}" alt="">
                                    @else
                                        <img class="circularImage"
                                            src="{{ asset('assets/images/usersImages/userPlaceHolder.png') }}" alt="">
                                    @endif
                                    <span class="ml-2"> {{ $request->user->name }}</span>
                                </div>
                                <div class="d-flex m-2">
                                    <Button id="acceptFollowingRequest"
                                        onclick="acceptFollowingRequest({{ $request->id }})"
                                        class="logout">Accept</Button>
                                    <Button id="cancelFollowingRequest"
                                        onclick="cancelFollowerRequest({{ $request->id }})"
                                        class="logout cancelBG">Cancel</Button>
                                </div>
                            </div>
                        @endforeach
                        <hr>
                    </div>
                @endif
                {{-- following peoples --}}
                <div class="followers">
                    <div class="title">You have <span>{{ count($followers) }} Followers</span></div>
                    @foreach ($followers as $follower)
                        <a href="{{ url('profile/' . $follower->user->id) }}" style="color: black">
                            <div class="data text-left">
                                @if ($follower->user->profilePicture)
                                    <img class="circularImage"
                                        src="{{ asset($follower->user->profilePicture->image) }}" alt="">
                                @else
                                    <img class="circularImage"
                                        src="{{ asset('assets/images/usersImages/userPlaceHolder.png') }}" alt="">
                                @endif
                                <div class="d-grid ml-2">
                                    {{ $follower->user->name }}
                                    <span class="description"> Follows you since
                                        {{ $follower->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>

                        </a>
                        {{-- <div class="description">
                        </div> --}}

                        <div class="block">
                           <i class="fa fa-ban" onclick="unfollow('{{$follower->id}}')"></i> Unfollow`
                        </div>
                        <div class="last"></div>

                    @endforeach


                </div>
            </div>

            <div class="col-md-3">
                <div class="notifications mx-auto">
                    <p class="margin-left-20">Live Notifications</p>
                    <div class="d-flex align-items-center margin-5 side">
                        <div class="iconsBackgroundBox">
                            <img src="assets/images/video.png" alt="">
                        </div>
                        <span class=" ml-2  notifications-primary-text"> John Doe started streaming of their
                            event</span>
                        <span class="agoColor">3s ago</span>
                    </div>

                    <hr>
                    <div class="d-flex align-items-center margin-5 side">
                        <div class="iconsBackgroundBox">
                            <img src="assets/images/camera_enhance.png" alt="">
                        </div>
                        <span class=" ml-2  notifications-primary-text"> John Doe started streaming of their
                            event</span>
                        <span class="agoColor">3s ago</span>
                    </div>

                    <hr>
                    <div class="d-flex align-items-center margin-5 side">
                        <div class="iconsBackgroundBox">
                            <img src="assets/images/video.png" alt="">
                        </div>
                        <span class=" ml-2  notifications-primary-text"> John Doe started streaming of their
                            event</span>
                        <span class="agoColor">3s ago</span>
                    </div>

                    <hr>
                    <div class="d-flex align-items-center margin-5 side">
                        <div class="iconsBackgroundBox">
                            <img src="assets/images/camera_enhance.png" alt="">
                        </div>
                        <span class=" ml-2  notifications-primary-text"> John Doe started streaming of their
                            event</span>
                        <span class="agoColor">3s ago</span>
                    </div>

                    <hr>
                    <div class="d-flex align-items-center margin-5 side">
                        <div class="iconsBackgroundBox">
                            <img src="assets/images/video.png" alt="">
                        </div>
                        <span class=" ml-2  notifications-primary-text"> John Doe started streaming of their
                            event</span>
                        <span class="agoColor">3s ago</span>
                    </div>

                    <hr>
                    <div class="d-flex align-items-center margin-5 side">
                        <div class="iconsBackgroundBox">
                            <img src="assets/images/camera_enhance.png" alt="">
                        </div>
                        <span class=" ml-2  notifications-primary-text"> John Doe started streaming of their
                            event</span>
                        <span class="agoColor">3s ago</span>
                    </div>

                    <hr>
                    <div class="d-flex align-items-center margin-5 side">
                        <div class="iconsBackgroundBox">
                            <img src="assets/images/video.png" alt="">
                        </div>
                        <span class=" ml-2  notifications-primary-text"> John Doe started streaming of their
                            event</span>
                        <span class="agoColor">3s ago</span>
                    </div>

                    <hr>
                    <div class="d-flex align-items-center margin-5 side">
                        <div class="iconsBackgroundBox">
                            <img src="assets/images/camera_enhance.png" alt="">
                        </div>
                        <span class=" ml-2  notifications-primary-text"> John Doe started streaming of their
                            event</span>
                        <span class="agoColor">3s ago</span>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/dist/jquery.toast.min.js') }}"></script>
    <script>
        function acceptFollowingRequest(id) {
            $.ajax({
                    type: 'POST',
                    url: '/acceptFollowingRequest',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "id": id,
                    },
                    success: function(response) {
                        showToaster(response.message, 'success');
                        location.reload();
                    }
                })
                .done(function() {

                })
        }

        function cancelFollowerRequest(id) {
            $.ajax({
                    type: 'POST',
                    url: '/cancelPendingRequest',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "id": id,
                    },
                    success: function(response) {
                        // showToaster(response.message, 'success');
                        location.reload();
                    }
                })
                .done(function() {

                })
        }

        function unfollow(id) {
            $.ajax({
                    type: 'POST',
                    url: '/unfollow',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "id": id,
                    },
                    success: function(response) {
                        showToaster(response.message, 'success');
                       location.reload();
                    }
                })
                .done(function() {

                })
        }
    </script>
</body>



</html>
