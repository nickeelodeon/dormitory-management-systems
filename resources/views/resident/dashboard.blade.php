@extends('layouts.resident')

@section('title', 'Available Rooms')

@section('content')
<div class="container py-4">
    <h2 class="text-black mb-4">Available Rooms</h2>
    
    <div class="row">
        @foreach($rooms as $room)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm" style="width: 100%;">
                <img src="{{ asset('images/dorm1.jpg') }}" class="card-img-top" alt="Room image">
                <div class="card-body">
                    <h5 class="card-title">Room {{ $room->room_num }}</h5>
                    <p class="card-text">
                        Floor: {{ $room->floor }} <br>
                        Status: <strong>{{ $room->status }}</strong>
                    </p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Capacity: {{ $room->capacity }}</li>
                    <li class="list-group-item">Current Occupants: {{ $room->current_occupants }}</li>
                    <li class="list-group-item">Gender: {{ $room->gender }}</li>
                    <li class="list-group-item">Rate: ₱{{ number_format($room->rates, 2) }}</li>
                </ul>
                <div class="card-body text-center">
                     <a href="#" class="btn btn-primary">Request Room</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection