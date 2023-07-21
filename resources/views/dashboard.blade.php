@extends('layouts.main')

@section('title','Dashboard | SilvaRx Events')

@section('content')

<div class="cold-md-10 offset-md-1 dashboard-title-container">
    <h1>My Events</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
    @else
    <p>You haven't created any events yet. <a href="/events/create">Create Event</a></p>
    @endif
</div>


@endsection