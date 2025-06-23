@extends('layouts.admin')

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
                    <th scope="col" colspan="2">Actions</th>
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
                    <td><center>
                        <a href="{{ route('admin.editroom', ['room' => $room]) }}" class="btn btn-secondary btn-sm">Edit</a>
                    </td><center>
                    <td><center>
                    <form method="POST" action="{{ route('admin.delroom', ['room' => $room->id]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form>
                </td></center>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="position-fixed bottom-0 end-0 p-4 d-flex flex-column gap-3" style="z-index: 1050;">
        <a href="{{ route('admin.addroom') }}" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center" 
        style="width: 60px; height: 60px;" title="Add Room">
            <i class="fas fa-bed"></i>
        </a>
        </a>
    </div>
@endsection

