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

                                    <span class="ml-1 b_comment"><img class="comt_img" src="{{url('assets/images/chatwhite.png')}}"
                                            alt=""> 20 Comments</span>


                                </div>
                                <div class="col-md-2  mediumTextGrey ">
                                    <img src="{{url('assets/images/forword.png')}}" alt="">
                                    <span class="ml-1 "> 20 Shares</span>
                                    <span class="ml-5 center"></span>

                                </div>
                                <div class="col-md-2  mediumTextGrey">
                                    <img src="{{url('assets/images/sna.png')}}" alt="">
                                    <span class="ml-2 "> 40 Live Snaps</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="eventsComment">
                    <span class="commentTitle "> 20 Comments</span>
                    <div class="comments">
                        <div class="row ">
                            <img class="smallCircularImage " src="{{url('assets/images/man.jpg')}}" />
                            <span class="commenterName">You </span>
                            <span class="commentTime"><img src="{{url('assets/images/forword.png')}}" alt=""> 2 min ago <img src="{{url('assets/images/flag.png')}}" alt=""></span>
                        </div>
                        <br>
                        <span class="commentText"> Guys wait, host is coming live</span>
                    </div>
                    <br>                    
                    <div class="comments">
                        <div class="row ">
                            <img class="smallCircularImage " src="{{url('assets/images/man.jpg')}}" />
                            <span class="commenterName">You </span>
                            <span class="commentTime"><img src="{{url('assets/images/forword.png')}}" alt=""> 2 min ago <img src="{{url('assets/images/flag.png')}}" alt=""></span>
                        </div>
                        <br>
                        <span class="commentText"> Guys wait, host is coming live</span>
                    </div>
                    <br>                    
                    <div class="comments">
                        <div class="row ">
                            <img class="smallCircularImage " src="{{url('assets/images/man.jpg')}}" />
                            <span class="commenterName">You </span>
                            <span class="commentTime"><img src="{{url('assets/images/forword.png')}}" alt=""> 2 min ago <img src="{{url('assets/images/flag.png')}}" alt=""></span>
                        </div>
                        <br>
                        <span class="commentText"> Guys wait, host is coming live</span>
                    </div>
                    <br>                    
                    <div class="comments">
                        <div class="row ">
                            <img class="smallCircularImage " src="{{url('assets/images/man.jpg')}}" />
                            <span class="commenterName">You </span>
                            <span class="commentTime"><img src="{{url('assets/images/forword.png')}}" alt=""> 2 min ago <img src="{{url('assets/images/flag.png')}}" alt=""></span>
                        </div>
                        <br>
                        <span class="commentText"> Guys wait, host is coming live</span>
                    </div>
                    <br>

                   
                </div>
            </div>
           @include('front.right_side')
        </div>
    </div>
    <script src="https://use.fontawesome.com/382f336cbc.js"></script>
</body>
</html>