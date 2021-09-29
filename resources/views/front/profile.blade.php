<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventSpotter</title>
    <link rel="stylesheet" href="{{ url('assets/style/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
    <link rel="shortcut icon" href="{{ url('assets//images/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="assets/libraries/css/bootstrap.min.css">
    <script src="assets/libraries/js/fontawesome.js"></script>

    </head>

    <body>
        @include('front.header')
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-md-9 col-sm-12 col-12 mx-auto ">
                    <div class="profileSection ">
                        <h6 class="mb-3 medium-text ml-4">Profile</h6>
                        <div class="profileInfo d-flex align-items-center mt-2 ml-3">
                            <img class="circularImage" src="/assets/images/profile.png" />
                            <div class="personInfo ml-3 ">
                                <span>{{$user->name}}</span>
                                <br>
                                <span class="light-grey normal-text">New york city</span>
                            </div>
                            <div class="personFollowersInfo d-flex mx-auto justify-content-center align-items-center">
                                <div class="grey-background margin-left-20 borderRadius5 text-center pl-3 pr-3">
                                    <span class="large-text">2000</span>
                                    <br>
                                    <span class="notifications-primary-text">Followers</span>
                                </div>
                                <div class="grey-background borderRadius5 margin-left-20 text-center pl-3 pr-3 ">
                                    <span class="large-text">230</span>
                                    <br>
                                    <span class="notifications-primary-text">Following</span>
                                </div>
                                <div class="grey-background borderRadius5  margin-left-20 text-center pl-3 pr-3">
                                    <span class="large-text">4</span>
                                    <br>
                                    <span class="notifications-primary-text">Events</span>
                                </div>


                                <button class="logout" onclick="window.location='{{url('/logout')}}'">
                                    <img src="/assets/images/logout.png" alt="logout" srcset="">
                                    <span class="ml-2">Logout</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="yourEvents">
                        <div class="d-flex align-items-center">
                            <h6 class=" medium-text ml-4 mt-2">Your Events</h6>
                            <button class="upcomingProfile ml-3">Upcoming</button>
                            <button class="pastOutlineButton ml-3">Past Events</button>
                            <button class="pastOutlineButton ml-3">Drafts</button>
                        </div>
                        <div class="d-flex scroll">
                            <div class="eventsCard">
                                <div class="mx-auto d-flex  align-items-center justify-content-center">
                                    <img class="profileEvents " src="assets/images/favourit1.png" alt="">
                                    <div class="ml-3">
                                        <h6 class="eventsTitleProfile">New year party at local park</h6>
                                        <img class="fav_title" src="assets/images/date.png" alt=""><span
                                            class="smallTextGrey"> Tomorrow</span>
                                        <br>
                                        <img class="fav_title" src="assets/images/location.png" alt=""> <span
                                            class="smallTextGrey"> 5km away</span>
                                    </div>
                                </div>
                            </div>

                            <div class="eventsCard">
                                <div class="mx-auto d-flex  align-items-center justify-content-center">
                                    <img class="profileEvents " src="assets/images/favourit2.png" alt="">
                                    <div class="ml-3">
                                        <h6 class="eventsTitleProfile">New year party at local park</h6>
                                        <img class="fav_title" src="assets/images/date.png" alt=""><span
                                            class="smallTextGrey"> Tomorrow</span>
                                        <br>
                                        <img class="fav_title" src="assets/images/location.png" alt=""> <span
                                            class="smallTextGrey"> 5km away</span>
                                    </div>
                                </div>
                            </div>

                            <div class="eventsCard">
                                <div class="mx-auto d-flex  align-items-center justify-content-center">
                                    <img class="profileEvents" src="assets/images/favourit3.png" alt="">
                                    <div class="ml-3">
                                        <h6 class="eventsTitleProfile">New year party at local park</h6>
                                        <img class="fav_title" src="assets/images/date.png" alt=""><span
                                            class="smallTextGrey"> Tomorrow</span>
                                        <br>
                                        <img class="fav_title" src="assets/images/location.png" alt=""> <span
                                            class="smallTextGrey"> 5km away</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="personalDetailsBg mb-5 ">
                        <div class="ml-4 mb-5">
                            <div class="mt-3">
                                <button class="upcomingProfile ml-3  medium-text">Personal Details</button>
                                <button class="pastOutlineButton ml-3">Settings</button>
                            </div>
                            <div class="personalDetailsContent ml-3 mt-3">
                                <label for="email" class="normal-text mt-3">Email</label>
                                <div class="inputFieldGreenBG d-flex ">
                                    <input type="email" class="headerSearchColor ml-3" name="email"
                                        value="johndoe@gmail.com" id="" disabled>
                                </div>
                                <label for="phoneNumber" class="normal-text mt-3">Phone Number</label>

                                <div class="inputFieldGreenBG d-flex ">
                                    <input type="text" class="headerSearchColor ml-3" name="phoneNumber"
                                        value="+923040542311" id="" disabled>
                                </div>
                                <div class="d-flex">
                                    <div class="field">
                                        <label for="email" class="normal-text mt-3">Address</label>
                                        <div class="inputFieldGreenBG d-flex ">
                                            <input type="address" class="headerSearchColor ml-3" name="address"
                                                value="Lorem 21, Street 25,23466 CA" id="" disabled>
                                        </div>
                                    </div>


                                    <div class="field ml-3">
                                        <label for="city" class="normal-text mt-3">City</label>
                                        <div class="smallInputFieldGreenBG d-flex ">
                                            <input type="text" class="headerSearchColor ml-3 " name="city"
                                                value="New york city" id="" disabled>
                                        </div>
                                    </div>

                                    <div class="field ml-3">
                                        <label for="country" class="normal-text mt-3">Country</label>
                                        <div class="smallInputFieldGreenBG d-flex ">
                                            <input type="text" class="headerSearchColor ml-3 " name="country"
                                                value="United States" id="" disabled>
                                        </div>
                                    </div>

                                </div>



                                <Button class="upcoming mt-5 mb-5">
                                    Edit Details
                                </Button>



                            </div>


                        </div>
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






                    </div>


                </div>

            </div>




        </div>


    </body>

</html>
