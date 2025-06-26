@extends('layouts.staff')

@section('title', 'Room Dashboard')

@section('content')
    <h1>ROOM DASHBOARD PAGE</h1>
    
    <div class="px-3 pt-3">
        <table class="table table-striped table-bordered" style="border: 2px solid black;">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Room Number</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Current Occupants</th>
                    <th scope="col">Gender Type</th>
                    <th scope="col">Floor</th>
                    <th scope="col">Status</th>
                    <th scope="col">Rates</th>
                    <th scope="col">Notes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->room_num }}</td>
                    <td>{{ $room->capacity }}</td>
                    <td>{{ $room->current_occupants }}</td>
                    <td>{{ $room->gender }}</td>
                    <td>{{ $room->floor }}</td>
                    <td>{{ $room->status }}</td>
                    <td>{{ $room->rates }}</td>
                    <td>{{ $room->notes }}</td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

