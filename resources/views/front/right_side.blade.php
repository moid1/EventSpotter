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

    <div class="col-md-3">
        <div class="notifications mx-auto">
            <p class="margin-left-20"> Notifications</p>
            @foreach (\App\Models\Notifications::where('user_id', Auth::id())->take(5)->orderBy('created_at','DESC')->get() as $noti)
                <div class="d-flex align-items-center margin-5 side">


                    <div class="iconsBackgroundBox">
                        <img src="assets/images/video.png" alt="">
                    </div>
                    <span class=" ml-2  notifications-primary-text"> {{ $noti->message }}</span>
                    <span class="agoColor">{{ $noti->created_at->diffForHumans() }}</span>
                </div>

                <hr>
            @endforeach

            <hr>
        </div>
    </div>
</body>

</html>
