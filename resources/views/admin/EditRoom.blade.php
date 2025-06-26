@extends('layouts.admin')

@section('title', 'Add Room')

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

{{-- Update Room Information Form --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Room Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.updateroom', ['room' => $room]) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="capacity" class="col-md-4 col-form-label text-md-end">{{ __('Capacity') }}</label>
                            <div class="col-md-6">
                                <input id="capacity" type="number" class="form-control" name="capacity" value="{{$room->capacity}}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="current_occupants" class="col-md-4 col-form-label text-md-end">{{ __('Current Occupants') }}</label>
                            <div class="col-md-6">
                                <input id="current_occupants" type="number" class="form-control" name="current_occupants" value="{{$room->current_occupants}}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender Type') }}</label>
                            <div class="col-md-6">
                                <select id="gender" class="form-control" name="gender" value="{{$room->gender_type}}" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                            <div class="col-md-6">
                                <select id="status" class="form-control" name="status" value="{{$room->status}}" required>
                                    <option value="Available">Available</option>
                                    <option value="Occupied">Occupied</option>
                                    <option value="Maintenance">Maintenance</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="notes" class="col-md-4 col-form-label text-md-end">{{ __('Notes') }}</label>
                            <div class="col-md-6">
                                <textarea id="notes" class="form-control" name="notes" value="{{$room->notes}}" rows="2"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rates" class="col-md-4 col-form-label text-md-end">{{ __('Rates') }}</label>
                            <div class="col-md-6">
                                <input id="rates" type="number" step="0.01" class="form-control" value="{{$room->rates}}" name="rates" required>
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


