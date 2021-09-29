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

    <div class="header">
        <div class="row align-items-center">
            <div class="col-md-2">
                <div class="headerlogo">
                    <a href="index.html"><img class="img-fluid" src="{{ url('assets/images/headerLogo.png') }}"
                            alt=""></a>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class=" col-md-7 mx-auto ">
                <div class="d-flex   align-items-center headerSearchBColor ">
                    <img class="img-fluid ml-2 mr-2 " src="{{ url('assets/images/icons/searechIcon.png') }}"
                        alt="search">
                    <input class="headerSearchColor" type="text" placeholder="Search">

                </div>
            </div>
            <div class="col-md-2 topMargin ">
                <div class="row align-items-center tools">
                    <div class="col-md-3 col-sm-4 col-4">
                        <div class="iconsBackgroundBox">
                            <a href="chat.html"> <img class="img-fluid"
                                    src="{{ url('assets/images/icons/emailIcon.png') }}" /></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-4">
                        <div class="iconsBackgroundBox ">
                            <a href="notification.html"><img class="img-fluid "
                                    src="{{ url('assets/images/icons/notificationBellIcon.png') }}" /></a>
                            <div class="notificationDot"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-4">
                        @if (Auth::user()->profile_image != null)
                            <a href="{{ url('/profile') }}"> <img class="circularImage"
                                    src="{{ url('assets/images/profile.png') }}" /></a>
                        @else
                            <a href="{{ url('/profile') }}"> <img class="circularImage"
                                    src="{{ url('assets/images/usersImages/userPlaceHolder.png') }}" /></a>

                        @endif
                        <div class="activeDot"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
