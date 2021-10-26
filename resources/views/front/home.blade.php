@include('layouts.head')

<body>
    @include('front.header')
    <div class="container-fluid">
        <div class="row">
            @include('front.left_side')
            <div class="col-md-6 mx-auto">
                <div class="createEventBG">
                    <a class="create_account text-white" href="#" data-toggle="modal"
                        data-target="#createEventModal"><img src="assets/images/plus.png" alt=""> Create a new event</a>
                </div>
                <p class="normal-text">Event Live Feed</p>
                <div class="eventLiveFeedSection">
                    <div class="d-flex text-center mt-3">
                        @if (count($nearEvents) > 0)
                            @foreach ($nearEvents as $event)
                                <div class="text-center">
                                    <img class="eventsPic mr-3"
                                        src="{{ asset($event['events']->eventPictures[0]->image_path) }}" />
                                    <h6 class="home_km mt-2">{{ $event['km'] }} KM</h6>
                                </div>
                            @endforeach
                        @else
                            <h6 class="text-center w-100">No Near Live Events Feed</h6>
                        @endif


                    </div>

                </div>


                <div class="eventsNearYouSection ">
                    <p class=" ml-1 normal-text">Events near you</p>
                    @if (count($nearEvents) > 0)
                        @foreach ($nearEvents as $event)
                            <div class="eventsNearYouBG">
                                <div class="eventsNearYou">
                                    <img src="{{ asset($event['events']->eventPictures[0]->image_path) }}"
                                        class="eventBgImage " alt="" srcset="">
                                    <div class="options">
                                        <div class="greenBanner  align-items-center d-flex">
                                            <i class="fa fa-user-plus text-white">
                                                <a href="event_detail.html"> <span
                                                        class="text-white">Followed</span></a>

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
                                        <img class="smallCircularImage mr-2 "
                                            src="{{ url($event['events']->user->profilePicture->image) }}" />
                                        <a style="color:black"
                                            href="{{url('/profile/'.$event['events']->user->id)}}"><span>{{ $event['events']->user->name }}</span></a>
                                    </div>
                                    <div class="whiteBanner text-center align-items-center d-flex">
                                        <i class="fa fa-user-plus">
                                        <span>{{$user->followers->count()}} Followers</span>
                                        </i>
                                    </div>
                                </div>

                                <div class="eventsSubDetails row mx-auto">
                                    <div class="col-md-7 col-sm-7 col-5">
                                        <span class="eventsTitle">{{ $event['events']->event_name }}</span>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-7">
                                        <div class="smallTextGrey row">
                                            <div class="col-md-6 col-sm-6 col-6">
                                                <i class="fa fa-calendar  ">
                                                    {{-- @php
                                                    $event['events']->event_date =  Carbon\Carbon::parse($event['events']->event_date);
                                                @endphp --}}
                                                    <span
                                                        class="text-center">{{ $event['events']->event_date }}</span>
                                                </i>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-6">
                                                <i class="fa fa-map-marker ">
                                                    <span>{{ $event['km'] }} Km away</span>
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
                        @endforeach

                    @else
                        <h6 class="text-center ">No Events Available </h6>

                    @endif




                    <!-- snaps -->
                    {{-- <div class="eventsNearYouBG">
                        <div class="eventsNearYou">
                            <img src="{{ url('assets/images/snapBg.png') }}" class="eventBgImage " alt="" srcset="">
                            <img src="{{ url('assets/images/play.png') }}" class="centerIcon">

                            <div class="whiteBanner left-0  text-center align-items-center d-flex">
                                <img class="smallCircularImage mr-2 " src="{{ url('assets/images/man.jpg') }}" />
                                <span>John Doe</span>
                            </div>

                            <div class="whiteBannerSmall text-center align-items-center d-flex">
                                <div class="iconsBackgroundBoxWhite">
                                    <img src="{{ url('assets/images/playGrey.png') }}" alt="" srcset="">
                                </div>
                            </div>

                        </div>

                        <div class="eventsSubDetails row mx-auto">
                            <div class="col-md-7 col-sm-7 col-5">
                                <span class="eventsTitle">Local Party</span>
                            </div>
                            <div class="col-md-5 col-sm-5 col-7 eventOptions">
                                <div class="smallTextGrey row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <i class="fa fa-calendar  ">
                                            <span>Tomorrow</span>
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
                    </div> --}}
                    <br><br>
                </div>
            </div>

            @include('front.right_side')
        </div>
    </div>
</body>
<!-- createEventModal -->
<div class="modal  bd-example-modal-lg" id="createEventModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg  ">
        <div class="modal-content">
            <div class="modal-body">
                <div class=" row align-items-center justify-content-center text-center ">
                    <div class="col-md-3">
                        <img class="img-fluid" src="{{ url('assets/images/headerLogo.png') }}" alt="" srcset="">
                    </div>
                    <div class="col-md-7 col-sm-8">
                        <h5>Create a new event</h5>
                    </div>
                    <div class="col-md-2">
                        <img class="w-20" src="{{ url('assets/images/info.png') }}" alt="" srcset="">
                    </div>
                </div>
                <div class="row mt-4 h-100">
                    <div class="col-md-6">
                        <div class="inputFieldGreenBG d-flex ">
                            <input type="text" class="headerSearchColor ml-3" name="eventName" id="eventName"
                                placeholder="Event Name">
                        </div>
                        <div class="inputFieldGreenBG  mt-2 h-50">
                            <textarea rows="5" type="text" class=" headerSearchColor  mt-2" name="eventDescription"
                                id="eventDescription" placeholder="Event Description"></textarea>
                        </div>
                        <label for="eventType" class="normal-text mt-3 mb-2">Event Type</label>
                        <select class="inputFieldGreenBG d-flex even_type" name="eventType" id="eventType">
                            <option selected disabled>Select</option>
                            <option value="">Crowded</option>
                            <option value="">Crowded</option>
                            <option value="">Crowded</option>
                        </select>
                    </div>
                    <div class=" col-md-5 text-center greyBorder borderRadius10">
                        <img id="eventPictureSrc" src="{{ url('assets/images/Frame.png') }}" alt="" srcset="">
                        <h6 class="lightGreenTeal uploadCatchyText mt-4">Upload a catchy event picture or video</h6>
                        <input type="file" name="image" id="uploadEventPicture" class="d-none" />

                        <Button onclick="getImages()" class="upcoming mb-3">Upload Picture/Video</Button>
                        <div class="d-flex eventPictures">

                        </div>
                    </div>



                    <input class="event_date" type="date" name="event_date" id="event_date"
                        placeholder="Event Date">
                    <div class="d-flex w-100 align-items-center inputFieldGreenBG mt-3 ml-3 mr-3">
                        <img class="img-fluid ml-2" src="{{ asset('assets/images/loc.png') }}" alt="">
                        <input type="text" id="venue" class="ml-2" name="location" placeholder="Venue">
                        {{-- <button class="loction_select"><img src="{{ asset('assets/images/loctin.png') }}" alt=""> Add
                            location from
                            map</button> --}}
                    </div>
                    <div class="d-flex w-100 align-items-center inputFieldGreenBG mt-3 ml-3 mr-3">
                        <img class="img-fluid ml-2" src="{{ url('assets/images/fil.png') }}" alt="">
                        <input class="ml-2" type="text" name="ticket_link" id="ticket_link"
                            placeholder="Ticket Link">
                        {{-- <button class="link_select"> Paste Link</button> --}}
                    </div>

                    <div class="w-100 eventsCondition">
                        <p class="event_cont eventCond">Event Conditions</p>
                        <button onclick="eventConditions(this)" class="event_con ">Add Conditions</button>
                    </div>
                    <div class="w-100">
                        <p class="event_cont"><img src="{{ url('assets/images/icons/eyeDark.png') }}"
                                class="mr-2 ">Event privacy</p>
                        <button id="publicBtn" onclick="makeEventPublic(1)" class="event_tag">Public</button>
                        <button id="privateBtn" onclick="makeEventPublic(0)" class="event_t">Private</button>
                        <!-- <p>This event will be public. Everyone on Event Spotter will be able to see this event details. </p> -->
                    </div>
                    <button class="create" id="createEventButton"> Create</button>
                    <button id="draftEvent" class="save"> Save as draft</button>

                </div>




            </div>



        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script src="{{ asset('assets/dist/jquery.toast.min.js') }}"></script>

<script type="text/javascript">
    var eventConditionsArray = [];
    let is_public = 0;
    var lat, lng;
    var geocoder;

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
    }
    //Get the latitude and the longitude;
    function successFunction(position) {
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
        codeLatLng(lat, lng);
    }

    function errorFunction(error) {
        alert(error.message);
    }

    function initialize() { 
        var places = new google.maps.places.Autocomplete(document.getElementById('venue'));
        console.log(places);
        google.maps.event.addListener(places, 'place_changed', function() {
            var place = places.getPlace();
            console.log(place);
            var address = place.formatted_address;
            lat = place.geometry.location.lat();
            lng = place.geometry.location.lng();


        });
        geocoder = new google.maps.Geocoder();
    }

    function codeLatLng(lat, lng) {
        var latlng = new google.maps.LatLng(lat, lng);
        console.log(lat + '  ' + lng);
        $.ajax({
            type: 'POST',
            url: '/save-lat-lng',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "lat": lat,
                'lng': lng,
            }
        }).done(function(msg) {

        })
    }

    function myfunction() {
        location.replace("your_event.html")
    }

    function eventConditions(condition) {

        if (condition.innerText == 'Add Conditions') {
            var conditionText = prompt("Condition", "");
            $("<button onclick='eventConditions(this)' class='event_tag'>" + conditionText + "</button>").insertAfter(
                '.eventCond');
            eventConditionsArray.push(conditionText);

        } else {}
    }

    function makeEventPublic(val) {
        is_public = val;
        if (val == 1) {
            $('#publicBtn').addClass('event_tag');
            $('#publicBtn').removeClass('event_t')
            $('#privateBtn').addClass('event_t');
            $('#privateBtn').removeClass('event_tag')
        } else {
            $('#publicBtn').addClass('event_t');
            $('#publicBtn').removeClass('event_tag');
            $('#privateBtn').addClass('event_tag');
            $('#privateBtn').removeClass('event_t')
        }
    }


    $('#createEventButton').click(function(event) {
        event.preventDefault();
        var form_data = new FormData();
        if (eventImages1 == null) {
            showToaster('Image is required', '');
            return;
        }
        form_data.append("image", eventImages1.files[0]);
        form_data.append('event_name', $('#eventName').val());
        form_data.append('event_description', $('#eventDescription').val());
        form_data.append('event_type', $('#eventType :selected').text());
        form_data.append('location', $('#venue').val());
        form_data.append('event_date', $('#event_date').val());
        form_data.append('ticket_link', $('#ticket_link').val());
        form_data.append('conditions', eventConditionsArray);
        form_data.append('is_public', is_public);
        form_data.append('lat', lat);
        form_data.append('lng', lng);
        $.ajax({
            type: 'POST',
            url: '/createEvent',
            mimeType: "multipart/form-data",
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form_data,
            error: function(res) {
                var errors = JSON.parse(res.responseText);
                console.log(errors);
                if (errors.errors.event_date) {
                    showToaster('Date is not valid.', 'error');
                }

            }
        }).done(function(msg) {
            showToaster('Your event has been created successfully', 'success');
            $('#createEventModal').modal('toggle');
        })
    });

    //draft event

    $('#draftEvent').click(function(event) {
        event.preventDefault();
        var form_data = new FormData();
        if (eventImages1.files[0] != null)
            form_data.append("image", eventImages1.files[0]);
        form_data.append('event_name', $('#eventName').val());
        form_data.append('event_description', $('#eventDescription').val());
        form_data.append('event_type', $('#eventType :selected').text());
        form_data.append('location', $('#venue').val());
        form_data.append('ticket_link', $('#ticket_link').val());
        form_data.append('conditions', eventConditionsArray);
        form_data.append('is_public', is_public);

        $.ajax({
            type: 'POST',
            url: '/draftEvent',
            mimeType: "multipart/form-data",
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form_data
        }).done(function(msg) {
            showToaster('Your event has been drafted', 'success');

        })
    });

    //upload Event Pictures & Videos

    function getImages() {
        $('#uploadEventPicture').click();
    }
    var eventImages1 = null;
    $(function() {
        $('#uploadEventPicture').change(function() {
            var input = this;
            eventImages1 = input;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" ||
                    ext == "jpg")) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#eventPictureSrc').attr('src', e.target.result);
                    $('#eventPictureSrc').addClass('img-fluid mb-5 mt-3');
                }
                $('.uploadCatchyText').addClass('d-none');
                reader.readAsDataURL(input.files[0]);


            } else {
                alert('Invalid Image type');
            }
        });

    });
</script>

</html>
