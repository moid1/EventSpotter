<p class="normal-text">Event Live Feed</p>
<div class="eventLiveFeedSection">
    <div class="d-flex text-center mt-3">
        @foreach ($nearEvents as $event)
            @isset($event['livefeed'])
                <a href="{{ url('eventSnap/' . $event['events']->id) }}" style="color:black">

                    <div class="text-center">
                        @if (Str::substr($event['livefeed']->path, -3) == 'mp4')
                            <video class="eventsPic mr-3" src="{{ asset($event['livefeed']->path) }}" controls>
                                <source src="{{ asset($event['livefeed']->path) }}" type="video/mp4">
                            </video>
                            <h6 class="home_km mt-2">{{ $event['km'] }} miles</h6>

                        @else
                            <img class="eventsPic mr-3" src="{{ asset($event['livefeed']->path) }}" />
                            <h6 class="home_km mt-2">{{ $event['km'] }} miles</h6>
                        @endif
                    </div>
                </a>
            @endisset

        @endforeach

    </div>
</div>
