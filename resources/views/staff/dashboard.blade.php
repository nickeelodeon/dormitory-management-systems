@extends('layouts.staff')
@section('title', 'Resident Dashboard')
@section('content')

    <h1>RESIDENT DASHBOARD PAGE</h1>

    <div class="px-3 pt-3">
        <table class="table table-striped table-bordered" style="border: 2px solid black;">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Age</th>
                    <th scope="col">Status</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Room</th>
                </tr>
            </thead>
            <tbody>
                @foreach($residents as $resident)
                <tr>
                    <td>{{ $resident->full_name }}</td>
                    <td>{{ $resident->email }}</td>
                    <td>{{ $resident->number }}</td>
                    <td>{{ $resident->gender }}</td>
                    <td>{{ $resident->age }}</td>
                    <td>{{ $resident->status }}</td>
                    <td>{{ $resident->payment_status }}</td>
                    <td>{{ $resident->room ? $resident->room->room_num : 'N/A' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

