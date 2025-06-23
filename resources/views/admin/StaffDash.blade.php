@extends('layouts.admin')

@section('title', 'Staff Dashboard')

@section('content')
    <h1>STAFF DASHBOARD PAGE</h1>
    
    <div class="px-3 pt-3">
        <table class="table table-striped table-bordered" style="border: 2px solid black;">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Number</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Position</th>
                    <th scope="col">Status</th>
                    <th scope="col" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffs as $staff)
                <tr>
                    <td>{{ $staff->full_name }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>{{ $staff->number }}</td>
                    <td>{{ $staff->gender }}</td>
                    <td>{{ $staff->gender }}</td>
                    <td>{{ $staff->status }}</td>
                    <td><center>
                        <a href="{{route('admin.editstaff', ['staff' => $staff])}}" class="btn btn-secondary btn-sm">Edit</a>
                    </td><center>
                    <td><center>
                    <form method="POST" action="{{ route('admin.delstaff', ['staff' => $staff->id]) }}">
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
        <!-- Add Staff Button -->
        <a href="{{ route('admin.addstaff') }}" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center"
        style="width: 60px; height: 60px;" title="Add Staff">
            <i class="fas fa-user-plus"></i>
        </a>
    </div>
@endsection

