@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Create New Workspace</h1>
        <a href="{{ route('admin.workspace.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Workspaces
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('admin.workspace.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">Workspace Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Workspace Type <span class="text-danger">*</span></label>
                                    <select class="form-select @error('type') is-invalid @enderror" 
                                            id="type" name="type" required>
                                        <option value="">Select Type</option>
                                        <option value="private_office" {{ old('type') == 'private_office' ? 'selected' : '' }}>Private Office</option>
                                        <option value="dedicated_desk" {{ old('type') == 'dedicated_desk' ? 'selected' : '' }}>Dedicated Desk</option>
                                        <option value="hot_desk" {{ old('type') == 'hot_desk' ? 'selected' : '' }}>Hot Desk</option>
                                        <option value="meeting_room" {{ old('type') == 'meeting_room' ? 'selected' : '' }}>Meeting Room</option>
                                        <option value="conference_room" {{ old('type') == 'conference_room' ? 'selected' : '' }}>Conference Room</option>
                                        <option value="coworking_space" {{ old('type') == 'coworking_space' ? 'selected' : '' }}>Coworking Space</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="capacity" class="form-label">Capacity <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('capacity') is-invalid @enderror" 
                                           id="capacity" name="capacity" min="1" value="{{ old('capacity', 1) }}" required>
                                    @error('capacity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="hourly_rate" class="form-label">Hourly Rate ({{ config('app.currency', '$') }})</label>
                                    <div class="input-group">
                                        <span class="input-group-text">{{ config('app.currency', '$') }}</span>
                                        <input type="number" class="form-control @error('hourly_rate') is-invalid @enderror" 
                                               id="hourly_rate" name="hourly_rate" min="0" step="0.01" 
                                               value="{{ old('hourly_rate', 0) }}">
                                        @error('hourly_rate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="daily_rate" class="form-label">Daily Rate ({{ config('app.currency', '$') }})</label>
                                    <div class="input-group">
                                        <span class="input-group-text">{{ config('app.currency', '$') }}</span>
                                        <input type="number" class="form-control @error('daily_rate') is-invalid @enderror" 
                                               id="daily_rate" name="daily_rate" min="0" step="0.01" 
                                               value="{{ old('daily_rate', 0) }}">
                                        @error('daily_rate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="weekly_rate" class="form-label">Weekly Rate ({{ config('app.currency', '$') }})</label>
                                    <div class="input-group">
                                        <span class="input-group-text">{{ config('app.currency', '$') }}</span>
                                        <input type="number" class="form-control @error('weekly_rate') is-invalid @enderror" 
                                               id="weekly_rate" name="weekly_rate" min="0" step="0.01" 
                                               value="{{ old('weekly_rate', 0) }}">
                                        @error('weekly_rate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="monthly_rate" class="form-label">Monthly Rate ({{ config('app.currency', '$') }})</label>
                                    <div class="input-group">
                                        <span class="input-group-text">{{ config('app.currency', '$') }}</span>
                                        <input type="number" class="form-control @error('monthly_rate') is-invalid @enderror" 
                                               id="monthly_rate" name="monthly_rate" min="0" step="0.01" 
                                               value="{{ old('monthly_rate', 0) }}">
                                        @error('monthly_rate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="amenities" class="form-label">Amenities</label>
                            <div class="row g-2">
                                @foreach($amenities as $amenity)
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" 
                                                   name="amenities[]" value="{{ $amenity->id }}" 
                                                   id="amenity_{{ $amenity->id }}"
                                                   {{ in_array($amenity->id, old('amenities', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="amenity_{{ $amenity->id }}">
                                                <i class="{{ $amenity->icon }} me-1"></i> {{ $amenity->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @error('amenities')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">Workspace Image</h5>
                            </div>
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <img id="workspace-image-preview" 
                                         src="{{ asset('images/workspace-placeholder.jpg') }}" 
                                         alt="Workspace Preview" 
                                         class="img-thumbnail mb-2" 
                                         style="width: 100%; height: 200px; object-fit: cover;">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                           id="image" name="image" 
                                           accept="image/*" 
                                           onchange="previewImage(this, 'workspace-image-preview')">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Recommended size: 1200x800px. Max 2MB. JPG, PNG, GIF.</div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">Availability</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Available Days</label>
                                    <div class="border rounded p-2">
                                        @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" 
                                                       name="available_days[]" value="{{ $day }}" 
                                                       id="day_{{ $day }}"
                                                       {{ in_array($day, old('available_days', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="day_{{ $day }}">
                                                    {{ ucfirst($day) }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('available_days')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="opening_time" class="form-label">Opening Time</label>
                                            <input type="time" class="form-control @error('opening_time') is-invalid @enderror" 
                                                   id="opening_time" name="opening_time" 
                                                   value="{{ old('opening_time', '09:00') }}">
                                            @error('opening_time')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="closing_time" class="form-label">Closing Time</label>
                                            <input type="time" class="form-control @error('closing_time') is-invalid @enderror" 
                                                   id="closing_time" name="closing_time" 
                                                   value="{{ old('closing_time', '18:00') }}">
                                            @error('closing_time')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Settings</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" 
                                               id="is_active" name="is_active" value="1" checked>
                                        <label class="form-check-label" for="is_active">Active</label>
                                    </div>
                                    <div class="form-text">Inactive workspaces won't be available for booking.</div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" 
                                               id="is_featured" name="is_featured" value="1"
                                               {{ old('is_featured') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">Featured</label>
                                    </div>
                                    <div class="form-text">Featured workspaces appear at the top of listings.</div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" 
                                               id="requires_approval" name="requires_approval" value="1"
                                               {{ old('requires_approval', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="requires_approval">Requires Approval</label>
                                    </div>
                                    <div class="form-text">If enabled, bookings require admin approval.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="min_booking_hours" class="form-label">Minimum Booking Hours</label>
                                    <input type="number" class="form-control @error('min_booking_hours') is-invalid @enderror" 
                                           id="min_booking_hours" name="min_booking_hours" min="1" 
                                           value="{{ old('min_booking_hours', 1) }}">
                                    @error('min_booking_hours')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="max_booking_hours" class="form-label">Maximum Booking Hours</label>
                                    <input type="number" class="form-control @error('max_booking_hours') is-invalid @enderror" 
                                           id="max_booking_hours" name="max_booking_hours" min="1" 
                                           value="{{ old('max_booking_hours', 8) }}">
                                    @error('max_booking_hours')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-undo me-1"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Create Workspace
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        const file = input.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "{{ asset('images/workspace-placeholder.jpg') }}";
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize any plugins or additional JS here
    });
</script>
@endpush
@endsection
