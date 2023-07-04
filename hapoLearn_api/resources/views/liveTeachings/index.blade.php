@extends('layouts.app')

@section('content')
    @if(!auth()->check() || auth()->user()->is_streaming === 0)
        <div class="starting-live-button">
            <button><a href="{{ route('live-teaching.start-live') }}">Starting Live</a></button>
        </div>
    @endif

    <div class="live-teaching custom-container">
        <div class="row">
            @if(sizeof($usersStreaming) > 0)
                @foreach($usersStreaming as $userStreaming)
                    <div class="col-4">
                        <div class="live-teaching-item mb-4">
                            <div class="teaching-item-img">
                                <img src="{{ $userStreaming->make_avata_url }}" alt="" srcset="">
                            </div>
                            <div class="teaching-item-content">
                                <p>{{ $userStreaming->name }}</p>
                                <button class="teaching-item-button">
                                    <a href="{{ route('live-teaching.join-live', $userStreaming->id) }}">Join</a>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no-item">No Classroom Live</div>
            @endif
        </div>
    </div>
@endsection