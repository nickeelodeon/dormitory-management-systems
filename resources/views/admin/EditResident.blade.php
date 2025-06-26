@extends('layouts.admin')

@section('title', 'Edit Resident')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

{{-- Display Errors --}}
@if ($errors->any())
<div aria-live="polite" aria-atomic="true" class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div class="toast show align-items-center text-bg-danger border-0" role="alert">
        <div class="d-flex">
            <div class="toast-body">
                <strong>Validation Error:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif

{{-- Update Resident Information Form --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Resident Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.updateresident', ['resident' => $resident]) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="full_name" class="col-md-4 col-form-label text-md-end">{{ __('Full Name') }}</label>
                            <div class="col-md-6">
                                <input id="full_name" type="text" class="form-control" name="full_name" value="{{ $resident->full_name }}" required readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $resident->email }}" required readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="number" class="col-md-4 col-form-label text-md-end">{{ __('Contact Number') }}</label>
                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control" name="number" value="{{ $resident->number }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>
                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control" name="age" value="{{ $resident->age }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                            <div class="col-md-6">
                                <select id="gender" class="form-control" name="gender" required>
                                    <option value="Male" {{ $resident->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $resident->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                            <div class="col-md-6">
                                <select id="status" class="form-control" name="status" required>
                                    <option value="Active" {{ $resident->status == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Inactive" {{ $resident->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="payment_status" class="col-md-4 col-form-label text-md-end">{{ __('Payment Status') }}</label>
                            <div class="col-md-6">
                                <select id="payment_status" class="form-control" name="payment_status" required>
                                    <option value="Paid" {{ $resident->payment_status == 'Paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="Unpaid" {{ $resident->payment_status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                                    <option value="Pending" {{ $resident->payment_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="room_id" class="col-md-4 col-form-label text-md-end">{{ __('Room') }}</label>
                            <div class="col-md-6">
                                <select id="room_id" class="form-control" name="room_id" required>
                                    <option value="">Select Room</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}" {{ $resident->room_id == $room->id ? 'selected' : '' }}>
                                            {{ $room->room_num }} ({{ $room->status }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Information') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
