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
            <div class="col-md-9 mx-auto">
                <div class="eventsNearYouSection ">
                    <div class="eventsNearYouBG">
                        <div class="eventsNearYou">
                            <img src="{{url('assets/images/your.png')}}" class="eventBgImage " alt="" srcset="">
                            <div class="options">
                                <div class="top_banner  align-items-center d-flex">
                                    <i class="fa fa-user-plus text-white">
                                        <span class="text-white">Followed</span>
                                    </i>
                                </div>
                                <div class="top_banner2 ">
                                    <i class="fa fa-heart red "></i>
                                </div>
                                <div class="top_banner2 mt-5 ">
                                    <i class="fa fa-flag light-grey "></i>
                                </div>
                            </div>
                            <div class="whiteBanner left-0  text-center align-items-center d-flex">
                                <img class="smallCircularImage mr-2 " src="{{url('assets/images/joh.png')}}" />
                                <span>John Doe</span>
                            </div>
                            <div class="whiteBanner text-center align-items-center d-flex">
                                <i class="fa fa-user-plus">
                                    <span>120 Followers</span>
                                </i>
                            </div>
                        </div>
                        <div class="eventsSubDetails d-flex align-items-center ">
                            <div class="col-md-9 mt-2">
                                <h4>New year party at local park</h4>
                            </div>
                            <div class="smallTextGrey d-flex align-items-center">
                                <i class="fa fa-calendar  ">
                                    <span>Tomorrow</span>
                                </i>
                                <div class="ml-3 mr-2 "></div>
                                <i class="fa fa-map-marker ">
                                    <span>5km away</span>
                                </i>
                            </div>
                        </div>
                        <div class="eventOptions ml-3 mt-3 mb-5  text-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="col-md-2  mediumTextGrey">
                                    <span class=" ">Events Details</span>
                                    <span class="ml-5 center"></span>

                                </div>
                                <div class="col-md-2  mediumTextGrey">
                                    <i class="fa fa-thumbs-up blue">
                                    </i>
                                    <span class="ml-2 blue"> 12 Likes</span>


                                </div>
                                <div class="col-md-3 mb-2  mediumTextGrey ">
                                    <span class="ml-1 "><img class="comt_img" src="{{url('assets/images/text.png')}}" alt=""> 20 Comments</span>
                                </div>
                                <div class="col-md-2  mediumTextGrey ">
                                    <img src="{{url('assets/images/forword.png')}}" alt="">
                                    <span class="ml-1 "> 20 Shares</span>
                                    <span class="ml-5 center"></span>

                                </div>
                                <div class="col-md-3 mb-2  mediumTextGrey ">

                                    <span class="ml-1 b_comment"><img class="comt_img" src="{{url('assets/images/whitvideo.png')}}" alt=""> 40 Live Snaps</span>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="event_comment">
                    <div class="eventLiveFeedSection">
                        <p class="mt-3 ml-5 normal-text"> Live Feed</p>
                        <div class="d-flex liveFeed">
                            <div class="liveFeedData">
                                <img src="{{url('assets/images/Rectangle 45.png')}}" />
                                <h6 class="home_km">1km </h6>
                            </div>
                            <div class="liveFeedData">
                                <img src="{{url('assets/images/Rectangle 46.png')}}" />
                                <h6 class="home_km">2km </h6>
                            </div>
                            <div class="liveFeedData">
                                <img src="{{url('assets/images/Rectangle 47.png')}}" />
                                <h6 class="home_km">3km </h6>
                            </div>
                            <div class="liveFeedData">
                                <img src="{{url('assets/images/Rectangle 48.png')}}" />
                                <h6 class="home_km">4km </h6>
                            </div>
                        </div>
                    </div>
                    <div class="eventsNearYouSection ">
                        <p class="mt-3 ml-1 normal-text">Snap</p>
                        <br>
                        <div class="eventsNearYouBG">
                            <div class="main_snap">
                                <div class="row snap_cb">
                                    <div class="col-1 mt-2">
                                        <img src="{{url('assets/images/joh.png')}}" />
                                    </div>
                                    <div class="col-9 mt-1">
                                        <p class="snap_nm">Rana Bilal Ahmed</p>
                                        <p class="snap_text">sdfsdaffdfdsf</p>
                                    </div>
                                    <div class="col-2 mt-4">
                                        <img src="{{url('assets/images/forword.png')}}" alt="">
                                        <p class="com_time">3s ago</p>
                                        <img class="com_flag" src="{{url('assets/images/flag.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="eventsNearYou">
                                    <img src="{{url('assets/images/snap5.png')}}" class="eventBgImage " alt="" srcset="">
                                    <a href=""><img src="{{url('assets/images/play.png')}}" class="centerIcon"></a>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="snp_btn">
                        <button class="snap_btn1">Go Live</button>
                        <button class="snap_btn2" data-toggle="modal" data-target="#exampleModalCenter">Upload Snap</button>
                    </div>
                    <br>
                </div>
                <br><br><br>
            </div>

         @include('front.right_side')
        </div>
    </div>

</body>
<!-- createEventModal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg  ">
        <div class="modal-content">
            <div class="modal-body">
                <div class=" row align-items-center justify-content-center text-center ">
                    <div class="col-md-3">
                        <img class="img-fluid" src="assets/images/headerLogo.png" alt="" srcset="">
                    </div>
                    <div class="col-md-7">
                        <h5>Upload Snap</h5>
                    </div>
                    <div class="col-md-2">
                        <img class="w-20" src="assets/images/info.png" alt="" srcset="">
                    </div>
                </div>
                <div class="row mt-4 h-25">
                    <div class="col-md-6">
                        <label for="">Tag people in snap</label>
                        <div class="inputFieldGreenBG d-flex ">
                            <input type="text" class="headerSearchColor ml-3" name="Snap Description" id="" placeholder="Snap Description">
                        </div>
                        <div class="inputFieldGreenBG  mt-2 h-50">
                            <input type="text" class="headerSearchColor ml-3 mt-2" name="Snap Description" id="" placeholder="Snap Description">
                        </div>
                    </div>
                    <div class=" col-md-5 text-center greyBorder borderRadius10">
                        <img src="assets/images/Frame.png" alt="" srcset="">
                        <br>
                        <Button class="upcoming mb-3">Upload Picture/Video</Button>
                    </div>
                    <button class="snp_uplo">Upload</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


</html>