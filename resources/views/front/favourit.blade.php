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
            <div class="col-md-6">
                <div class="top_button">
                    <button class="upcoming">Upcoming</button>
                    <button class="past">Past Events</button>
                </div>
                <div class="favourit">
                    <div class="row">
                        <div class="col-2">
                            <img src="{{url('assets/images/favourit1.png')}}" alt="">
                        </div>
                        <div class="col-9">
                            <h4 class="title_favourit">New year party at local park</h4>
                            <div class="row ">
                                <div class="col-4 date">
                                    <img class="fav_title" src="{{url('assets/images/date.png')}}" alt=""> Tomorrow
                                </div>
                                <div class="center location"></div>
                                <div class="col-4">
                                    <img class="fav_title" src="{{url('assets/images/location.png')}}" alt=""> 5km away
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-4">
                                    <img class="fav_title" src="{{url('assets/images/following.png')}}" alt=""> Tomorrow
                                </div>
                                <div class="center"></div>
                                <div class="col-2">
                                    <img class="fav_title" src="{{url('assets/images/like.png')}}" alt=""> 20
                                </div>
                                <div class="center"></div>
                                <div class="col-2">
                                    <img class="fav_text" src="{{url('assets/images/text.png')}}" alt="">
                                    <p class="text">12</p>

                                </div>
                                <div class="center"></div>
                                <div class="col-1">
                                    <img class="fav_text" src="{{url('assets/images/forword.png')}}" alt="">
                                    <p class="text">15</p>
                                </div>
                                <div class="center"></div>
                                <div class="col-1">
                                    <img class="fav_text" src="{{url('')}}assets/images/vid.png" alt="">
                                    <p class="text">40</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <img src="{{url('assets/images/heart.png')}}" alt="">
                        </div>
                    </div>
                </div>

            </div>
@include('front.right_side')
        </div>
    </div>
</body>
</html>