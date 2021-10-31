@include('layouts.head')

<body>
    @include('front.header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3  float-left">
                <div class="sidebar ">
                    <div>
                        <i class="fa fa-location-arrow mr-3 ml-3" aria-hidden="true"></i>
                        <a class="side_tag" href="{{ url('/') }}">Explore events</a>
                    </div>
                    <hr>
                    <div>
                        <i class="fa fa-calendar mr-3 ml-3" aria-hidden="true"></i>
                        <a class="side_tag" href="{{ url('userEvents') }}">Your events</a>
                    </div>
                    <hr>
                    <div class="sideBarActive active  align-items-center d-flex">
                        <i class="   fa fa-heart mr-3 ml-3" aria-hidden="true"></i>
                        <a class="side_tag" href="#"> Favorite events</a>
                    </div>
                    <hr>
                    <div class="align-items-center d-flex">
                        <i class="fa fa-user-plus mr-3 ml-3" aria-hidden="true"></i>
                        <a class="side_tag" href="{{ url('follower') }}">Followers</a>
                    </div>
                    <hr>
                    <div class=" align-items-center d-flex">
                        <i class="fa fa-user mr-3 ml-3" aria-hidden="true"></i>
                        <a class="side_tag" href="{{ url('/following') }}">Following</a>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-md-6">
                <div class="top_button">
                    <button onclick="getFavouriteUpcomingEvents()"
                        class="{{ $metaData ? 'past' : 'upcoming' }} ">Upcoming</button>
                    <button onclick="getFavouriteUserPastEvents()" class="{{ $metaData ? 'upcoming' : 'past' }} ">Past
                        Events</button>
                </div>
                @if (count($favrouiteEvent) > 0)


                    <div class="favEvent">
                        @foreach ($favrouiteEvent as $event)

                            <div class="favourit">
                                <div class="row">

                                    <div class="col-2">
                                        <a class="nowrap"
                                            href="{{ url('eventDetails/' . $event['events']->id) }}">
                                            <img class="" style="width: 90px;height:90px"
                                                src="{{ asset($event['events']->eventPictures[0]->image_path) }}"
                                                alt="">
                                        </a>
                                    </div>


                                    <div class="col-9">
                                        <h4 class="title_favourit">{{ $event['events']->event_name }}</h4>
                                        <div class="row ">
                                            <div class="col-4 date">
                                                <img class="fav_title" src="{{ url('assets/images/date.png') }}"
                                                    alt="">
                                                {{ $event['events']->event_date }}
                                            </div>
                                            <div class="center location"></div>
                                            <div class="col-4">
                                                <img class="fav_title"
                                                    src="{{ url('assets/images/location.png') }}" alt="">
                                                {{ $event['km'] }} Miles
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="fav_title"
                                                    src="{{ url('assets/images/following.png') }}" alt="">
                                                {{ $event['events']->user->followers->count() }} Followers
                                            </div>
                                            <div class="center"></div>
                                            <div class="col-2">
                                                <i class="fa fa-thumbs-up light-grey">
                                                  
                                                </i>
                                                {{ $event['events']->like->count() }}
                                            </div>
                                            <div class="center"></div>
                                            <div class="col-2">
                                                <i class="fa fa-comment light-grey">
                                                  
                                                       
                                                </i>
                                                {{ $event['events']->comment->count() }}
                                            </div>
                                            {{-- <div class="center"></div>
                                            <div class="col-1">
                                                <img class="fav_text"
                                                    src="{{ url('assets/images/forword.png') }}" alt="">
                                                <p class="text">15</p>
                                            </div> --}}
                                            <div class="center"></div>
                                            <div class="col-1 nowrap">
                                                <i class="fa fa-play light-grey">

                                                </i>
                                                
                                              {{ $event['events']->livefeed->count() }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1   text-center align-items-center">
                                        <i onclick="favroute(this) " data-id="{{ $event['events']->id }}"
                                            class="fa fa-heart red "></i>
                                        <a href="{{ url('eventDetails/' . $event['events']->id) }}">
                                            <i class="mt-2  fa fa-info-circle light-grey "></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center mt-5 ">
                        <h6>No Events Found</h6>
                    </div>
                @endif
            </div>

            @include('front.right_side')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/dist/jquery.toast.min.js') }}"></script>
    <script>
        function getFavouriteUserPastEvents() {
            window.location.href = "/getFavouriteUserPastEvents";
        }

        function getFavouriteUpcomingEvents() {
            window.location.href = "/getFavouriteUpcomingEvents";
        }

        function favroute(icon, eventId) {
            var id = $(icon).attr('data-id');
            if ($(icon).hasClass("light-grey")) {
                $.ajax({
                    type: 'POST',
                    url: '/saveFavrouite',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'event_id': id,
                    }
                }).done(function(msg) {
                    showToaster(msg.message, 'success');
                    $(icon).removeClass('light-grey');
                    $(icon).addClass('red');
                })
            } else if ($(icon).hasClass('red')) {
                $.ajax({
                    type: 'POST',
                    url: '/deleteFavrouite',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'event_id': id,
                    }
                }).done(function(msg) {
                    showToaster(msg.message, 'success');
                    $(icon).addClass('light-grey');
                    $(icon).removeClass('red');
                })
            }
        }
    </script>
</body>



</html>
