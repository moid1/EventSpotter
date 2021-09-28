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
            <div class="col-md-9">
                <div class="eventsNearYouSection ">
                    <div class="eventsNearYouBG">
                        <div class="eventsNearYou">
                            <img src="{{url('assets/images/event1.png')}}" class="eventBgImage " alt="" srcset="">
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
                                <img class="smallCircularImage mr-2 " src="{{url('assets/images/man.jpg')}}" />
                                <span>John Doe</span>
                            </div>
                            <div class="whiteBanner text-center align-items-center d-flex">
                                <i class="fa fa-user-plus">
                                    <span>120 Followers</span>
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
                </div>
                <div class="event_comment">
                    <div class="event_tit">Details </div>
                    <p class="event_desc"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dolor scelerisque
                        dolor sed lacus bibendum. In lacinia sollicitudin laoreet sapien, consequat amet, dictum arcu
                        consequat. Platea vestibulum turpis fames tellus. Iaculis eu aliquet
                        quam id. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dolor scelerisque dolor sed
                        lacus bibendum. In lacinia sollicitudin laoreet sapien, consequat amet, dictum arcu consequat.
                        Platea vestibulum turpis fames tellus.
                        Iaculis eu aliquet quam id.</p>
                    <div class="event_tit">Conditions </div>
                    <div class="con_tag">
                        <button class="condition_tag">18+</button>
                        <button class="condition_tag">Only Males</button>
                        <button class="condition_tag">No smoking</button>
                    </div>
                    <br><br>
                    <div class="location_title">Location </div>
                    <p class="event_desc"> 2345 City, 213 Street, 23123 LA.</p>
                    <img class="map" src="{{url('assets/images/map.png')}}" alt="">
                    <button class="map_button">Buy Ticket</button>



                </div>
            </div>

            <br>



@include('front.right_side')
        </div>
    </div>

</body>

</html>