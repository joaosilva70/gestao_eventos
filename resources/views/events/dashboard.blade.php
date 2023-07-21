@extends('layouts.main')

@section('title','Dashboard | SilvaRx Events')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>My Events</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <th scope="row">{{ $loop-> index+1 }}</th>
                <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                <td>{{ count($event->users) }}</td>
                <td>
                    <a class="btn btn-primary" href="/events/edit/{{ $event->id }}"><ion-icon name="create-outline"></ion-icon>Edit</a>
                    <form action="/events/{{ $event->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" href="#"><ion-icon name="trash-outline"></ion-icon>Delete</button>
                    </form>


                </td>
            <tr>
                @endforeach
        </tbody>
    </table>
    @else
    <p>You haven't created any events yet. <a href="/events/create">Create Event</a></p>
    @endif
</div>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Events I'm attending</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    @if(count($eventsasparticipant) > 0)
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Participants</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventsasparticipant as $event)
            <tr>
                <th scope="row">{{ $loop-> index+1 }}</th>
                <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                <td>{{ count($event->users) }}</td>
                <td>
                    <form action="/events/leave/{{ $event->id}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn btn-danger" type="submit"><ion-icon name="log-out-outline"></ion-icon>Leave</button>
                    </form>
                </td>
            <tr>
                @endforeach
        </tbody>
    </table>
    @else
    <h1>You are not yet participating in any events. <a href="/">Check Events</a></h1>
    @endif
</div>



@endsection