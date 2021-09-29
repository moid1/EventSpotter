<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventSpotter</title>
    <link rel="stylesheet" href="{{url('assets/style/style.css')}}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
    <link rel="shortcut icon" href="{{url('assets//images/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="assets/libraries/css/bootstrap.min.css">
    <script src="assets/libraries/js/fontawesome.js"></script>

</head>
<body>
@include('front.header')
    <div class="container-fluid">
        <div class="row">
          @include('front.left_side')
            <div class="col-md-6 mx-auto">
                <div class="createEventBG">
                    <a class="create_account text-white" href="#" data-toggle="modal" data-target="#createEventModal"><img src="assets/images/plus.png" alt=""> Create a new event</a>
                </div>
                <p class="normal-text">Event Live Feed</p>
                <div class="eventLiveFeedSection">
                    <div class="d-flex text-center">
                        <div class="">
                            <img class="eventsPic" src="{{url('assets/images/Rectangle 45.png')}}" />
                            <h6 class="home_km">1km </h6>
                        </div>
                        <div>
                            <img class="eventsPic" src="{{url('assets/images/Rectangle 46.png')}}" />
                            <h6 class="home_km">2km </h6>
                        </div>
                        <div>
                            <img class="eventsPic" src="{{url('assets/images/Rectangle 47.png')}}" />
                            <h6 class="home_km">3km </h6>
                        </div>
                        <div>
                            <img class="eventsPic" src="{{url('assets/images/Rectangle 48.png')}}" />
                            <h6 class="home_km">4km </h6>
                        </div>
                        <div>
                            <img class="eventsPic" src="{{url('assets/images/Rectangle 49.png')}}" />
                            <h6 class="home_km">6km </h6>
                        </div>
                        <div>
                            <img class="eventsPic" src="{{url('assets/images/Rectangle 50.png')}}" />
                            <h6 class="home_km">5km </h6>
                        </div>
                        <div>
                            <img class="eventsPic" src="{{url('assets/images/Rectangle 45.png')}}" />
                            <h6 class="home_km">7km </h6>
                        </div>
                        <div>
                            <img class="eventsPic" src="{{url('assets/images/Rectangle 45.png')}}" />
                            <h6 class="home_km">1km </h6>
                        </div>
                        <div>
                            <img class="eventsPic" src="{{url('assets/images/Rectangle 46.png')}}" />
                            <h6 class="home_km">2km </h6>
                        </div>
                        <div>
                            <img class="eventsPic" src="{{url('assets/images/Rectangle 47.png')}}" />
                            <h6 class="home_km">3km </h6>
                        </div>
                        <div>
                            <img class="eventsPic" src="{{url('assets/images/Rectangle 48.png')}}" />
                            <h6 class="home_km">4km </h6>
                        </div>
                        <div>
                            <img class="eventsPic" src="{{url('assets/images/Rectangle 49.png')}}" />
                            <h6 class="home_km">6km </h6>
                        </div>
                        <div>
                            <img class="eventsPic" src="{{url('assets/images/Rectangle 50.png')}}" />
                            <h6 class="home_km">5km </h6>
                        </div>
                        <div>
                            <img class="eventsPic" src="{{url('assets/images/Rectangle 45.png')}}" />
                            <h6 class="home_km">7km </h6>
                        </div>


                    </div>

                </div>


                <div class="eventsNearYouSection ">
                    <p class=" ml-1 normal-text">Events near you</p>
                    <div class="eventsNearYouBG">
                        <div class="eventsNearYou">
                            <img src="{{url('assets/images/event1.png')}}" class="eventBgImage " alt="" srcset="">
                            <div class="options">
                                <div class="greenBanner  align-items-center d-flex">
                                    <i class="fa fa-user-plus text-white">
                                        <a href="event_detail.html"> <span class="text-white">Followed</span></a>
                                        
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
                                <img class="smallCircularImage mr-2 " src="{{url('assets/images/man.jpg')}}" />
                                <a href="event_detail.html"><span>John Doe</span></a>
                            </div>
                            <div class="whiteBanner text-center align-items-center d-flex">
                                <i class="fa fa-user-plus">
                                    <a href="event_detail.html"><span>120 Followers</span></a>
                                </i>
                            </div>
                        </div>

                        <div class="eventsSubDetails row mx-auto">
                            <div class="col-md-7 col-sm-7 col-5">
                                <span class="eventsTitle">New year party at local park</span>
                            </div>
                            <div class="col-md-5 col-sm-5 col-7">
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


                    <div class="eventsNearYouBG">
                        <div class="eventsNearYou">
                            <img src="{{url('assets/images/event1.png')}}" class="eventBgImage " alt="" srcset="">
                            <div class="options">
                                <div class="greenBanner  align-items-center d-flex">
                                    <i class="fa fa-user-plus text-white">
                                        <a href="event_detail.html"> <span class="text-white">Followed</span></a>

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
                                <img class="smallCircularImage mr-2 " src="{{url('assets/images/man.jpg')}}" />
                                <a href="event_detail.html"> <span>John Doe</span></a>
                            </div>
                            <div class="whiteBanner text-center align-items-center d-flex">
                                <i class="fa fa-user-plus">
                                    <a href="event_detail.html"><span>120 Followers</span></a>
                                </i>
                            </div>
                        </div>

                        <div class="eventsSubDetails row mx-auto">
                            <div class="col-md-7 col-sm-7 col-5">
                                <span class="eventsTitle">New year party at local park</span>
                            </div>
                            <div class="col-md-5 col-sm-5 col-7">
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

                    <!-- snaps -->
                    <div class="eventsNearYouBG">
                        <div class="eventsNearYou">
                            <img src="{{url('assets/images/snapBg.png')}}" class="eventBgImage " alt="" srcset="">
                            <img src="{{url('assets/images/play.png')}}" class="centerIcon">

                            <div class="whiteBanner left-0  text-center align-items-center d-flex">
                                <img class="smallCircularImage mr-2 " src="{{url('assets/images/man.jpg')}}" />
                                <span>John Doe</span>
                            </div>

                            <div class="whiteBannerSmall text-center align-items-center d-flex">
                                <div class="iconsBackgroundBoxWhite">
                                    <img src="{{url('assets/images/playGrey.png')}}" alt="" srcset="">
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
                    </div>
                    <br><br>
                </div>
            </div>

@include('front.right_side')
        </div>
    </div>
</body>
<!-- createEventModal -->
<div class="modal  bd-example-modal-lg" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg  ">
        <div class="modal-content">
            <div class="modal-body">
                <div class=" row align-items-center justify-content-center text-center ">
                    <div class="col-md-3">
                        <img class="img-fluid" src="{{url('assets/images/headerLogo.png')}}" alt="" srcset="">
                    </div>
                    <div class="col-md-7 col-sm-8">
                        <h5>Create a new event</h5>
                    </div>
                    <div class="col-md-2">
                        <img class="w-20" src="{{url('assets/images/info.png')}}" alt="" srcset="">
                    </div>
                </div>
                <div class="row mt-4 h-100">
                    <div class="col-md-6">
                        <div class="inputFieldGreenBG d-flex ">
                            <input type="text" class="headerSearchColor ml-3" name="eventName" id="" placeholder="Event Name">
                        </div>
                        <div class="inputFieldGreenBG  mt-2 h-50">
                            <input type="text" class="headerSearchColor ml-3 mt-2" name="eventDescription" id="" placeholder="Event Description">
                        </div>
                        <label for="eventType" class="normal-text mt-3 mb-2">Event Type</label>
                        <select class="inputFieldGreenBG d-flex even_type" name="eventType">
                            <option selected disabled>Select</option>
                            <option value="">Crowded</option>
                            <option value="">Crowded</option>
                            <option value="">Crowded</option>
                        </select>
                    </div>
                    <div class=" col-md-5 text-center greyBorder borderRadius10">
                        <img src="{{url('assets/images/Frame.png')}}" alt="" srcset="">
                        <h6 class="lightGreenTeal mt-4">Upload a catchy event picture or video</h6>
                        <Button class="upcoming mb-3">Upload Picture/Video</Button>
                    </div>

                    <input class="event_date" type="date" name="" id="" placeholder="Event Description">
                    <div class="location">
                        <img src="{{url('assets/images/loc.png')}}" alt="">
                        <input type="text" name="" id="" placeholder="Location">
                        <button class="loction_select"><img src="{{url('assets/images/loctin.png')}}" alt=""> Add location from
                            map</button>
                    </div>
                    <div class="location">
                        <img src="{{url('assets/images/fil.png')}}" alt="">
                        <input type="text" name="" id="" placeholder="Ticket Link">
                        <button class="link_select"> Paste Link</button>
                    </div>

                    <div class="w-100">
                        <p class="event_cont">Event Conditions</p>
                        <button class="event_tag ">+18</button>
                        <button class="event_tag ">Only Males</button>
                        <button class="event_tag ">Only Males</button>
                        <button class="event_con ">+ Add Conditions</button>
                    </div>
                    <div class="w-100">
                        <p class="event_cont"><img src="{{url('assets/images/icons/eyeDark.png')}}" class="mr-2 ">Event privacy</p>
                        <button class="event_tag ">Public</button>
                        <button class="event_t">Private</button>
                        <!-- <p>This event will be public. Everyone on Event Spotter will be able to see this event details. </p> -->
                    </div>
                    <button class="create" onclick="myfunction()"> Create</button>
                    <button class="save"> Save as draft</button>
                </div>




            </div>


            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


<script>
    function myfunction() {
        location.replace("your_event.html")
    }
</script>

</html>