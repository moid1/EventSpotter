@include('layouts.head')

<body>
    @include('front.header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="eventsNearYouSection ">
                    <div class="eventsNearYouBG" style="box-shadow: none">
                        <div class="eventsNearYou">
                            <img src="{{ asset($eventDetails['event']->eventPictures[0]->image_path) }}"
                                class="eventBgImage " alt="" srcset="">
                            <div class="options">
                                <div
                                    class="{{ $eventDetails['Following'] == 1 ? 'darkGreenBanner' : 'greenBanner' }}   align-items-center d-flex">
                                    <i class="fa fa-user-plus text-white">
                                        <span class="text-white">Followed</span>
                                    </i>
                                </div>
                                {{-- <div class="whiteIconsBackgroundBox ">
                                    <i class="fa fa-heart red "></i>
                                </div> --}}
                                {{-- <div class="whiteIconsBackgroundBox mt-5 ">
                                    <i class="fa fa-flag light-grey "></i>
                                </div> --}}
                            </div>
                            <a href="{{ url('profile/' . $eventDetails['event']->user_id) }}">
                                <div class="whiteBanner left-0  text-center align-items-center d-flex">
                                    <img class="smallCircularImage mr-2 "
                                        src="{{ asset($eventDetails['event']->user->profilePicture->image) }}" />
                                    <span>{{ $eventDetails['event']->user->name }}</span>
                                </div>
                            </a>
                            <div class="whiteBanner text-center align-items-center d-flex">
                                <i class="fa fa-user-plus">
                                    <span>{{ $eventDetails['event']->user->followers->count() }} Followers</span>
                                </i>
                            </div>
                        </div>

                        <div class="eventsSubDetails row mx-auto">
                            <div class="col-md-7 col-sm-7 col-5">
                                <span class="eventsTitle">{{ $eventDetails['event']->event_name }}</span>
                            </div>
                            <div class="col-md-5 col-sm-5 col-7">
                                <div class="smallTextGrey row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <i class="fa fa-calendar  ">
                                            <span>{{ $eventDetails['event']->created_at->diffForHumans() }}</span>
                                        </i>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <i class="fa fa-map-marker ">
                                            <span>{{ $eventDetails['km'] }} Miles away</span>
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="eventOptions">
                            <div class="row mx-auto justify-content-between ">
                                <div id="isLiked" onclick="like(this)" data-id="{{ $eventDetails['event']->id }}"
                                    class="nowrap  col-md-3 col-sm-3 col-3 {{ $eventDetails['isLiked'] == 1 ? 'blue' : 'nothing' }} ">
                                    <i class="fa fa-thumbs-up ">
                                    </i>
                                    <span id="totalLikes{{ $eventDetails['event']->id }}"
                                        class="eventsDetailsHome  ">
                                        {{ $eventDetails['event']->like->count() }}
                                        Likes</span>
                                    {{-- <span class="vertical"></span> --}}
                                </div>
                                <a class="nowrap" style="text-decoration: none"
                                    href="{{ url('eventComment/' . $eventDetails['event']->id) }}">
                                    <div class="col-md-3 col-sm-3 col-3  mediumTextGrey ">
                                        <i class="fa fa-comments">
                                        </i>
                                        <span class="eventsDetailsHome">
                                            {{ $eventDetails['event']->comment->count() }}
                                            Comments</span>
                                        {{-- <span class="vertical"></span> --}}
                                    </div>
                                </a>
                                {{-- <div class="col-md-3 col-sm-3 col-3  mediumTextGrey ">
                                    <i class="fa fa-share">
                                    </i>
                                    <span class="eventsDetailsHome"> 20 Shares</span>
                                    <span class="vertical"></span>

                                </div> --}}
                                <div class="col-md-3 col-sm-3 col-3 mediumTextGrey">
                                    <i class="fa fa-play ">
                                    </i>
                                    <span class="eventsDetailsHome"> {{ $eventDetails['event']->livefeed->count() }}
                                        Live Snaps</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="event_comment">
                    <div class="eventLiveFeedSection ml-2">
                        <p class="mt-3  normal-text mb-2"> Live Feed</p>

                        <div class="d-flex liveFeed">
                            @foreach ($eventFeeds as $feed)
                                <div class="liveFeedData text-center">
                                    @if (Str::substr($feed->path, -3) == 'mp4')
                                        <video class="eventsPic mr-3 mb-2" src="{{ asset($feed->path) }}" controls>
                                            <source src="{{ asset($feed->path) }}" type="video/mp4">

                                        </video>
                                        <h6 class="home_km">{{ $feed->user->name }} </h6>

                                    @else
                                        <img class="eventsPic mr-3 mb-2" src="{{ asset($feed->path) }}" />
                                        <h6 class="home_km">{{ $feed->user->name }} </h6>
                                    @endif
                                </div>
                            @endforeach
                        </div>


                    </div>
                    <div class="eventsNearYouSection ">
                        <p class="mt-3 ml-1 normal-text m">Snap</p>
                        @foreach ($eventFeeds as $feed)

                            <div class="mt-3 eventsNearYouBG">
                                <div class="main_snap">
                                    <div class="row snap_cb">
                                        <div class="col-1 mt-2">
                                            <img class="smallCircularImage"
                                                src="{{ asset($feed->user->profilePicture->image) }}" />
                                        </div>
                                        <div class="col-9 mt-1">
                                            <p class="snap_nm">{{ $feed->user->name }}</p>
                                            <p class="snap_text">{{ $feed->description }}</p>
                                        </div>
                                        <div class="col-2  row">
                                            {{-- <img class="img-fluid" src="{{ asset('assets/images/forword.png') }}" alt=""> --}}
                                            <p class="com_time nowrap">{{ $feed->created_at->diffForHumans() }}</p>
                                            {{-- <img class="com_flag" src="{{ asset('assets/images/flag.png') }}"
                                            alt=""> --}}
                                        </div>
                                    </div>
                                    <div class="eventsNearYou">
                                        @if (Str::substr($feed->path, -3) == 'mp4')
                                            <video class="eventBgImage" src="{{ asset($feed->path) }}" controls>
                                                <source src="{{ asset($feed->path) }}" type="video/mp4">

                                            </video>
                                        @else
                                            <img onclick="window.open(this.src)" src="{{ asset($feed->path) }}"
                                                class="eventBgImage " alt="" srcset="">
                                            {{-- <a href=""><img src="{{ asset('assets/images/play.png') }}"
                                                class="centerIcon"></a> --}}
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <div class=" d-flex justify-content-center">
                        {{-- <button class="snap_btn1">Go Live</button> --}}
                        <button class="snap_btn2" data-toggle="modal" data-target="#exampleModalCenter">Upload
                            Snap</button>
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg  ">
        <div class="modal-content">
            <div class="modal-body">
                <div class=" row align-items-center justify-content-center text-center ">
                    <div class="col-md-3">
                        <img class="img-fluid" src="{{ asset('assets/images/headerLogo.png') }}" srcset="">
                    </div>
                    <div class="col-md-7">
                        <h5>Upload Snap</h5>
                    </div>
                    <div class="col-md-2 " id="infoDialog">
                        <img class="w-20" src="{{ asset('assets/images/info.png') }}" srcset="">
                    </div>
                    <p id="infoText" style="background: #314648;
                    border-radius: 10px;
                    font-size: 11px;
                    padding: 20px;
                    display:none;
                    color: white;">Upload a live snap of an event. This feature shows the scenery of an ongoing event
                        to users when
                        a live snap is uploaded from an event</p>
                </div>
                <div class="row mt-4 h-25">
                    <div class="col-md-6">

                        <div class="inputFieldGreenBG  mt-2 h-50">
                            <textarea style="margin-left: 15px;" rows="4" type="text" class=" headerSearchColor  mt-2"
                                name="snapDescription" id="snapDescription" placeholder="Snap Description"></textarea>
                        </div>
                        {{-- <label for="">Tag people in snap</label>
                        <div class="inputFieldGreenBG d-flex ">
                            <input type="text" class="headerSearchColor ml-3" name="Snap Description" id=""
                                placeholder="Snap Description">
                        </div> --}}
                    </div>
                    <div class=" col-md-5 text-center greyBorder borderRadius10">
                        <img id="eventPictureSrc" src="{{ asset('assets/images/Frame.png') }}" alt="" srcset="">
                        <video id="eventVideoSrc" src="" class="eventBgImage" style="display: none"></video>
                        <br>
                        <Button id="" onclick="getSnaps()" class="upcoming mb-3 mt-2">Upload Picture/Video</Button>
                        <input type="file" name="image" id="uploadEventSnap" class="d-none" />

                    </div>
                
                </div>

                <div class="progress mt-3 d-none">
                    <div class="bar"></div>
                    <div class="percent">0%</div>
                </div>

                <button id="uploadSnap" class="snp_uplo">Upload</button>


            </div>
        </div>
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script src="{{ asset('assets/dist/jquery.toast.min.js') }}"></script>
<script>
    var eventss = {!! json_encode($eventDetails['event']->toArray()) !!};
</script>
<script>
    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');

    function getSnaps() {
        $('#uploadEventSnap').click();
    }

    function like(event) {
        var id = $(event).attr('data-id');
        $.ajax({
            type: 'POST',
            url: '/like',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'event_id': id,
            }
        }).done(function(msg) {
            showToaster(msg.message, 'success');
            $('#totalLikes' + id).html(msg.totalLikes + ' Likes');
            $(event).removeClass('blue');
            $(event).addClass(msg.className);

        })
    }

    var eventSnap = null;
    $(function() {
        $('#uploadEventSnap').change(function() {
            var input = this;
            eventSnap = input;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" ||
                    ext == "jpg")) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#eventPictureSrc').attr('src', e.target.result);
                    $('#eventPictureSrc').addClass('img-fluid mb-5 mt-3');
                    $('#eventPictureSrc').show();
                    $('#eventVideoSrc').hide();

                }
                // $('.uploadCatchyText').addClass('d-none');
                reader.readAsDataURL(input.files[0]);


            } else if (input.files && input.files[0] && (ext == "mp4")) {
                $('#eventPictureSrc').toggle();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#eventVideoSrc').show();
                    $('#eventVideoSrc').attr('src', e.target.result);
                    $('#eventPictureSrc').hide();

                    // $('#eventPictureSrc').addClass('img-fluid mb-5 mt-3');
                }
                // $('.uploadCatchyText').addClass('d-none');
                reader.readAsDataURL(input.files[0]);
            } else {
                alert('Invalid Image type');
            }
        });

    });
    $('#uploadSnap').click(function(event) {
        event.preventDefault();
        var form_data = new FormData();
        if (eventSnap == null) {
            showToaster('Snap is required', '');
            return;
        }
        form_data.append("path", eventSnap.files[0]);
        form_data.append('description', $('#snapDescription').val());
        form_data.append('event_id', eventss.id);

        $.ajax({
            type: 'POST',
            url: '/uploadEventSnap',
            mimeType: "multipart/form-data",
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            beforeSend: function() {
                $("#uploadSnap").prop('disabled', true); //disable.
                $('.progress').removeClass('d-none');
            },
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);

                        var percentVal = percentComplete + '%';
                        bar.width(percentVal);
                        bar.css("background","#314648");
                        percent.html(percentVal);
                    }
                }, false);

                return xhr;
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form_data,
            error: function(res) {
                var errors = JSON.parse(res.responseText);

            }
        }).done(function(msg) {
            $("#uploadSnap").prop('disabled', false); //disable.
            $('.progress').addClass('d-none');

            showToaster('Your snap has been uploaded successfully', 'success');
            $('#exampleModalCenter').modal('toggle');
            location.reload();

        })
    });

    $('#infoDialog').click(function(event) {
        $('#infoText').toggle('hide');
    });
</script>


</html>
