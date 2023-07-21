@extends('layouts.main')
@if($search)
@section('title', $search. ' | SilvaRx Events')
@else
@section('title', 'Home | SilvaRx Events')
@endif


@section('content')


<div class="bg-dark text-secondary px-4 py-5 text-center">
  <div class="py-5">
    <h1 class="display-5 fw-bold text-white">Search Event</h1>
    <div class="col-lg-6 mx-auto">
      <p class="fs-5 mb-4">Here you can search a Event</p>
      <form action="/" method="GET" class="d-flex">
        <input class="form-control me-2" type="search" id="search" name="search" placeholder="Search" aria-label="Search">
        <input class="btn btn-outline-success" type="submit" value="Search">
      </form>
    </div>
  </div>
</div>

<section class="section-event">
  <div class="container px-5 py-5" id="custom-cards">
    @if($search)
    <h2 class="h2-card-title">Results for: {{ $search }}</h2>
    <p class="p-card-title">{{ count($events) }} result(s) were found.</p>
    @else
    <h2 class="h2-card-title">Upcoming Events</h2>
    <p class="p-card-title">See upcoming events</p>
    @endif
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
      @foreach($events as $event)
      <div class="col">
        <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('img/events/{{ $event->image}} ');background-size: cover;">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">{{ $event->title }}</h2>
            <ul class="d-flex list-unstyled mt-auto">
              <li class="me-auto"><a href="/events/{{ $event->id }}" class="btn btn-outline-secondary px-2">Details</a></li>
              <li class="d-flex align-items-center me-3">
                <svg class="bi me-2" width="1em" height="1em">
                  <use xlink:href="#geo-fill" />
                </svg>
                <small>{{ count($event->users) }} <ion-icon name="people"></ion-icon></small>
              </li>
              <li class="d-flex align-items-center">
                <svg class="bi me-2" width="1em" height="1em">
                  <use xlink:href="#calendar3" />
                </svg>
                <small>{{ date('d/m/Y', strtotime($event->date)) }}</small>
              </li>
            </ul>
          </div>
        </div>
      </div>
      @endforeach
      @if(count($events) == 0 && $search)
        <p>There are no results that contain the word {{ $search }}!<a href="/"><br>See all</a></p>
      @elseif(count($events) == 0)
        <p>There are no events soon.</p>
      @endif
    </div>
  </div>
</section>
@endsection