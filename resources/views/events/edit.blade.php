@extends('layouts.main')

@section('title', 'Editing: '. $event->title .' | SilvaRx Events')

@section('content')
<section class="section-event">
    <div class="container py-5 px-5">
        <div class="py-5 px-5 text-center">
            <h2 class="h2-card-title">Editing the Event: {{ $event->title }}</h2>
            <p class="lead"></p>
        </div>

        <div class="row g-5">
            <div class="col-md-7 col-lg-12">
                <h4 class="mb-3">Event Data</h4>

                <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-sm-12">
                            <label for="eventDate" class="form-label">Event Name</label>
                            <input type="text" class="form-control" id="eventName" name="title" value="{{ $event->title }}">
                        </div>
                        
                        <div class="col-sm-12">
                            <label for="eventName" class="form-label">Event Date</label>
                            <input type="date" class="form-control" id="eventDate" name="date" value="{{date('Y-m-d', strtotime($event->date));}}">
                        </div>

                        <div class="col-sm-12">
                            <label for="eventName" class="form-label">Event Location</label>
                            <input type="text" class="form-control" id="eventLocation" name="city" value="{{ $event->city }}">
                        </div>

                        <div class="mb-3">
                            <label for="eventImage" class="form-label">Event Image</label>
                            <input class="form-control" type="file" id="eventImage" name="image">
                            <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview img-fluid">
                        </div>

                        <div class="col-md-12">
                            <label for="eventPrivate" class="form-label">Private?</label>
                            <select class="form-select" id="eventPrivate" name="private">
                                <option value="0">No</option>
                                <option value="1" {{ $event->private == 1 ? "selected = 'selected'" : "" }}>Yes</option>
                            </select>
                        </div>

                        <div class="col-sm-12">
                            <label for="eventDescription" class="form-label">Event Description</label>
                            <textarea type="text" class="form-control" id="eventDescription" name="description">{{ $event->description }}</textarea>
                        </div>

                        <div class="col-sm-12">
                            <label for="eventDescription" class="form-label">Event Extras</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Chairs" name="items[]">
                                <label class="form-check-label" for="EventExtraChairs">
                                    Chairs
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Stage" name="items[]">
                                <label class="form-check-label" for="EventExtraStage">
                                    Stage
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Drinks" name="items[]">
                                <label class="form-check-label" for="EventExtraDrinks">
                                    Drinks
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Food" name="items[]">
                                <label class="form-check-label" for="EventExtraFood">
                                    Food
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Gifts" name="items[]">
                                <label class="form-check-label" for="EventExtraGifts">
                                    Gifts
                                </label>
                            </div>
                        </div>

                    </div>
                    <hr class="my-4">
                    <input class="w-100 btn btn-primary btn-lg" type="submit" value="Edit Event">
                </form>
            </div>
        </div>
    </div>
</section>
@endsection