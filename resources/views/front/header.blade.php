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
        <div class="row ">
            <div class="col-md-2">
                <div class="headerlogo">
                    <a href="index.html"><img class="img-fluid" src="{{ url('assets/images/headerLogo.png') }}"
                            alt=""></a>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class=" col-md-7 ">

                <div class="d-flex    headerSearchBColor ">
                    <img class="img-fluid ml-2 mr-2 " src="{{ url('assets/images/icons/searechIcon.png') }}"
                        alt="search">
                    <input class="" id="search" name="search" type="text" placeholder="Search">

                </div>
                <div class="searchResults"></div>

                
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="application/javascript">
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var text = $('#search').val();
                if (text == '') {
                    $('.searchResults').addClass('d-none');
                }else{
                    $('.searchResults').removeClass('d-none');

                }

                $.ajax({
                    type: "GET",
                    url: '/search',
                    data: {
                        text: text,
                    },
                    success: function(data) {
                        var img = "<img class='circularImage' src='" + data[0].profile_picture.image + "' />"
                        $.each(data, function(key, value) {
                            $('.searchResults').html(
                                '<div class="w-100 headerSearchBColor ">' + img+ value
                                .name + '</div>');
                        })
                    }
                }).done(function() {
                    // $('.searchResults').addClass('d-none');
                })
            });
        });
    </script>
</body>

</html>
