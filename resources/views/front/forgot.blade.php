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

<body style="overflow: auto;">
    <div class="row h-100 m-0">
        <div class="col-md-6 padding-0">
            <div class="loginBg ">
                <span class="left-top"></span>
                <span class="right-top circle"></span>
                <span class="left-bottom circle"></span>
                <span class="right-bottom"></span>

                <div class="text-center bottomPostion ">
                    <img src="{{url('assets/images/Explore Events around.png')}}" alt="" srcset="">
                    <br>
                    <img src="{{url('assets/images/You.png')}}" alt="" srcset="">
                </div>
            </div>
        </div>
        <div class="col-md-6 align-items-center justify-content-center centerAnyThing right-col">
            <span class="right-top"></span>
            <span class="left-bottom"></span>
            <div class="text-center">
                <img class="sign_log" src="{{url('assets/images/logo.png')}}" alt="" srcset="">
                <h6 class="medium-heading-green mt-3">Forgot Password?</h6>
                <div class="mt-4 d-inline-block">
                    <div class="inputFieldGreenBG d-flex ">
                        <img src="{{url('assets/images/emailDark.png')}}" class="ml-3" alt="" srcset="">
                        <input type="email" class="headerSearchColor ml-3" name="Enter your email" placeholder="Enter your email" id="email">
                    </div>
                    <button class="upcoming mt-3 w-100">
                        Reset Password
                    </button>
                    <a href="{{url('login')}}">
                        <button class="past mt-3 w-100">
                        Or Login instead
                    </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>