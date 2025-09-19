@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Edit Team Member: {{ $teamMember->name }}</h1>
        <a href="{{ route('admin.team-members.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to List
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('admin.team-members.update', $teamMember->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $teamMember->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="position" class="form-label">Position <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('position') is-invalid @enderror" 
                                           id="position" name="position" value="{{ old('position', $teamMember->position) }}" required>
                                    @error('position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email', $teamMember->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" name="phone" value="{{ old('phone', $teamMember->phone) }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control @error('bio') is-invalid @enderror" 
                                      id="bio" name="bio" rows="4">{{ old('bio', $teamMember->bio) }}</textarea>
                            @error('bio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="facebook" class="form-label">Facebook Profile</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                        <input type="url" class="form-control @error('facebook') is-invalid @enderror" 
                                               id="facebook" name="facebook" value="{{ old('facebook', $teamMember->facebook) }}" placeholder="https://facebook.com/username">
                                    </div>
                                    @error('facebook')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="twitter" class="form-label">Twitter Profile</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                        <input type="url" class="form-control @error('twitter') is-invalid @enderror" 
                                               id="twitter" name="twitter" value="{{ old('twitter', $teamMember->twitter) }}" placeholder="https://twitter.com/username">
                                    </div>
                                    @error('twitter')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="linkedin" class="form-label">LinkedIn Profile</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                        <input type="url" class="form-control @error('linkedin') is-invalid @enderror" 
                                               id="linkedin" name="linkedin" value="{{ old('linkedin', $teamMember->linkedin) }}" placeholder="https://linkedin.com/in/username">
                                    </div>
                                    @error('linkedin')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="instagram" class="form-label">Instagram Profile</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                        <input type="url" class="form-control @error('instagram') is-invalid @enderror" 
                                               id="instagram" name="instagram" value="{{ old('instagram', $teamMember->instagram) }}" placeholder="https://instagram.com/username">
                                    </div>
                                    @error('instagram')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h6 class="mb-0">Profile Photo</h6>
                            </div>
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <img id="photoPreview" 
                                         src="{{ $teamMember->photo ? asset('storage/' . $teamMember->photo) : asset('assets/images/placeholder-user.jpg') }}" 
                                         alt="Photo Preview" 
                                         class="img-fluid rounded-circle mb-3" 
                                         style="width: 200px; height: 200px; object-fit: cover;">
                                </div>
                                <div class="mb-3">
                                    <input type="file" 
                                           class="form-control @error('photo') is-invalid @enderror" 
                                           id="photo" 
                                           name="photo" 
                                           accept="image/*"
                                           onchange="previewImage(this, 'photoPreview')">
                                    @error('photo')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    @if($teamMember->photo)
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" id="remove_photo" name="remove_photo" value="1">
                                            <label class="form-check-label" for="remove_photo">
                                                Remove current photo
                                            </label>
                                        </div>
                                    @endif
                                    <div class="form-text">Recommended size: 400x400px</div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Settings</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="display_order" class="form-label">Display Order</label>
                                    <input type="number" class="form-control @error('display_order') is-invalid @enderror" 
                                           id="display_order" name="display_order" value="{{ old('display_order', $teamMember->display_order) }}" min="0">
                                    @error('display_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_active" 
                                               name="is_active" value="1" {{ old('is_active', $teamMember->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">Active</label>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="show_on_team_page" 
                                               name="show_on_team_page" value="1" {{ old('show_on_team_page', $teamMember->show_on_team_page) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="show_on_team_page">Show on Team Page</label>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="show_on_about_page" 
                                               name="show_on_about_page" value="1" {{ old('show_on_about_page', $teamMember->show_on_about_page) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="show_on_about_page">Show on About Page</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <a href="{{ route('admin.team-members.index') }}" class="btn btn-outline-secondary me-md-2">
                        <i class="fas fa-times me-1"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Update Team Member
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
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "{{ $teamMember->photo ? asset('storage/' . $teamMember->photo) : asset('assets/images/placeholder-user.jpg') }}";
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize any plugins or custom scripts
    });
</script>
@endpush
@endsection
