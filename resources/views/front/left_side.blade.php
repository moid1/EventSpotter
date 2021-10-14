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
            <div class="col-md-3 float-left">
                <div class="sidebar ">
                    <div class="sideBarActive active  align-items-center d-flex">
                        <i class="fa fa-location-arrow mr-3 ml-3" aria-hidden="true"></i>
                        <a class="side_tag" href="index.html">Explore events</a>
                    </div>
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
                    <div>
                        <i class="fa fa-user-plus mr-3 ml-3" aria-hidden="true"></i>
                        <a class="side_tag" href="{{url('follower')}}">Followers</a>
                    </div>
                    <hr>
                    <div>
                        <i class="fa fa-user mr-3 ml-3" aria-hidden="true"></i>
                        <a class="side_tag" href="{{url('following')}}">Following</a>
                    </div>
                    <hr>
                    <div>
                        <i class="fa fa-calendar-check-o mr-3 ml-3" aria-hidden="true"></i>
                        <a class="side_tag" href="events_your.html">Event you attended</a>
                    </div>
                    <hr>
                </div>
                <div class="filterEvents">
                    <span class="leftMenuHeading">Filter events</span>
                    <div class="filterEventsBox">
                        <div class="row  ">
                            <span class="hintText">Sort by</span>
                            <div class=" fieldBackground ">
                                <select class="grey-background selectpicker" name="Interest" id="">
                                    <option value="Interest">Interest</option>
                                    <option value="Interest">Interest</option>
                                    <option value="Interest">Interest</option>
                                </select>
                            </div>
                        </div>
                        <div class="row ">
                            <span class="hintText">Distance</span>
                            <div class="fieldBackground ">
                                5 kms
                            </div>
                        </div>
                        <div class="row">
                            <span class="hintText">From</span>
                            <div class=" fieldBackground  ">
                                <input type="date" name="fromDate" id="">
                            </div>
                        </div>
                        <div class="row ">
                            <span class="hintText">To</span>
                            <div class=" fieldBackground ">
                                <input type="date" name="toDate" id="">
                            </div>
                        </div>

                        <div class="row ">
                            <span class="leftMenuHeading ml-3">Conditions</span>
                        </div>
                        <div class="row tagsParent">
                            <div class=" tags">
                                Free Wifi
                            </div>

                            <div class=" tags">
                                No Smoking
                            </div>
                            <div class=" tags">
                                Only males
                            </div>
                        </div>


                    </div>
                </div>
            </div>
</body>
</html>