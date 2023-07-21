@extends('layouts.main')

@section('title',$event->title . ' | SilvaRx Events')

@section('content')
<section class="section-event">
    <div class="container px-5 py-5">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div id="image-container" class="col-md-6">
                    <img src="/img/events/{{ $event-> image}}" class="img-fluid" alt="{{ $event->title }}">
                </div>
                <div id="info-container" class="col-md-6">
                    <h1>{{ $event->title }}</h1>
                    <p class="event-city"><ion-icon name="location-outline"></ion-icon>{{ $event->city }}</p>
                    <p class="event-participants"><ion-icon name="people-outline"></ion-icon>{{ count($event->users) }} participants.</p>
                    <p class="event-owner"><ion-icon name="star-outline"></ion-icon>{{ $eventOwner['name'] }}</p>
                    @if(!$hasUserJoined)
                        <form action="{{ url('events/join/' . $event->id) }}" method="POST">
                        @csrf
                        <a href="{{ url('events/join/' . $event->id) }}" class="btn btn-primary" id="event-submit" onclick="event.preventDefault(); this.closest('form').submit();">Confirm Presence</a>
                        </form>
                    @else
                        <p class="already-joined-msg">You are already participating in this event.</p>
                    @endif
                    <h3>This event has the following extras:</h3>
                    <ul id="items-list">
                    @foreach ($event->items as $item)
                        <li><ion-icon name="play-outline"></ion-icon><span>{{ $item }}</span></li>
                    @endforeach
                    </ul>
                </div>
                <div class="col-md-12" id="description-container">
                    <h3>Description</h3>
                    <p class="event-description">{{ $event->description }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection