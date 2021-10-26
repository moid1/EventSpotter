@include('layouts.head')

<body>
    @include('front.header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="eventsNearYouSection ">
                    <div class="eventsNearYouBG">
                        <div class="eventsNearYou">
                            <img src="{{ asset($event->eventPictures[0]->image_path) }}" class="eventBgImage " alt=""
                                srcset="">
                            <div class="options">
                                <div class="greenBanner  align-items-center d-flex">
                                    <i class="fa fa-user-plus text-white">
                                        <span class="text-white">Followed</span>
                                    </i>
                                </div>
                                <div class="whiteIconsBackgroundBox ">
                                    <i class="fa fa-heart red "></i>
                                </div>
                                <div class="whiteIconsBackgroundBox mt-5 ">
                                    <i class="fa fa-flag light-grey "></i>
                                </div>
                            </div>
                            <div class="whiteBanner left-0  text-center align-items-center d-flex">
                                <img class="smallCircularImage mr-2 " src="{{ asset($event->user->profilePicture->image) }}" />
                                <span>{{$event->user->name}}</span>
                            </div>
                            <div class="whiteBanner text-center align-items-center d-flex">
                                <i class="fa fa-user-plus">
                                    <span>120 Followers</span>
                                </i>
                            </div>
                        </div>

                        <div class="eventsSubDetails row mx-auto">
                            <div class="col-md-7 col-sm-7 col-5">
                                <span class="eventsTitle">{{ $event->event_name }}</span>
                            </div>
                            <div class="col-md-5 col-sm-5 col-7">
                                <div class="smallTextGrey row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <i class="fa fa-calendar  ">
                                            <span>{{ $event->created_at->diffForHumans() }}</span>
                                        </i>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <i class="fa fa-map-marker ">
                                            <span>5km away</span>
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="eventOptions">
                            <div class="row mx-auto ">
                                <div class="col-md-3 col-sm-3 col-3">
                                    <i class="fa fa-thumbs-up blue">
                                    </i>
                                    <span class="eventsDetailsHome blue"> 12 Likes</span>
                                    <span class="vertical"></span>
                                </div>
                                <div class="col-md-3 col-sm-3 col-3  mediumTextGrey ">
                                    <i class="fa fa-comments">
                                    </i>
                                    <span class="eventsDetailsHome"> 20 Comments</span>
                                    <span class="vertical"></span>
                                </div>

                                <div class="col-md-3 col-sm-3 col-3  mediumTextGrey ">
                                    <i class="fa fa-share">
                                    </i>
                                    <span class="eventsDetailsHome"> 20 Shares</span>
                                    <span class="vertical"></span>

                                </div>
                                <div class="col-md-3 col-sm-3 col-3 mediumTextGrey">
                                    <i class="fa fa-play ">
                                    </i>
                                    <span class="eventsDetailsHome"> 40 Live Snaps</span>
                                </div>
                            </div>
                        </div>
                    </div>






                </div>

                <div class="event_comment">
                    <div class="event_tit">Details </div>
                    <p class="event_desc"> {{ $event->event_description }}</p>
                    <div class="event_tit">Conditions </div>
                    <div class="con_tag">
                        @php
                            $conditionsArr = explode(',', unserialize($event->conditions));
                        @endphp
                        @foreach ($conditionsArr as $condition)
                            <button class="condition_tag">{{ $condition }}</button>
                        @endforeach
                    </div>
                    <br><br>
                    <div class="location_title">Location </div>
                    <p class="event_desc"> {{ $event->location }}</p>
                    {{-- <img class="map" src="{{asset('assets/images/map.png')}}" alt=""> --}}
                    <div id="map"></div>

                    <button class="map_button">Buy Ticket</button>



                </div>
            </div>

            <br>



            @include('front.right_side')

        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script src="{{ asset('assets/dist/jquery.toast.min.js') }}"></script>
<script>
    var event = {!! json_encode($event->toArray()) !!};

    function initialize() {
        var myLatlng = new google.maps.LatLng(event.lat, event.lng);
        var myOptions = {
            zoom: 16,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById("map"), myOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: "Fast marker"
        });

        marker['infowindow'] = new google.maps.InfoWindow({
            content: event.location
        });

        google.maps.event.addListener(marker, 'mouseover', function() {
            this['infowindow'].open(map, this);
        });
    }
</script>

</html>
