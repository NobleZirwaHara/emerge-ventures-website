@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Edit User: {{ $user->name }}</h1>
        <div>
            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-outline-secondary me-2">
                <i class="fas fa-eye me-1"></i> View
            </a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back to Users
            </a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Information</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" 
                                           id="first_name" name="first_name" 
                                           value="{{ old('first_name', $user->first_name) }}" required>
                                    @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                                           id="last_name" name="last_name" 
                                           value="{{ old('last_name', $user->last_name) }}" required>
                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" 
                                   value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Leave password fields blank to keep current password.
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">New Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                           id="password" name="password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Leave blank to keep current password</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" 
                                           id="password_confirmation" name="password_confirmation">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" name="phone" 
                                   value="{{ old('phone', $user->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="bio" class="form-label">Biography</label>
                            <textarea class="form-control @error('bio') is-invalid @enderror" 
                                      id="bio" name="bio" rows="3">{{ old('bio', $user->bio) }}</textarea>
                            @error('bio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" 
                                      id="address" name="address" rows="2">{{ old('address', $user->address) }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" 
                                           id="city" name="city" 
                                           value="{{ old('city', $user->city) }}">
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="postal_code" class="form-label">Postal Code</label>
                                    <input type="text" class="form-control @error('postal_code') is-invalid @enderror" 
                                           id="postal_code" name="postal_code" 
                                           value="{{ old('postal_code', $user->postal_code) }}">
                                    @error('postal_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select @error('country') is-invalid @enderror" 
                                    id="country" name="country">
                                <option value="">Select Country</option>
                                @foreach($countries as $code => $name)
                                    <option value="{{ $code }}" {{ old('country', $user->country) == $code ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('country')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">Profile Photo</h5>
                            </div>
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <img id="profile-photo-preview" 
                                         src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('images/default-avatar.png') }}" 
                                         alt="Profile Photo" 
                                         class="img-thumbnail mb-2" 
                                         style="width: 200px; height: 200px; object-fit: cover;">
                                    <input type="file" class="form-control @error('profile_photo') is-invalid @enderror" 
                                           id="profile_photo" name="profile_photo" 
                                           accept="image/*" 
                                           onchange="previewImage(this, 'profile-photo-preview')">
                                    @error('profile_photo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Max 2MB. JPG, PNG, GIF.</div>
                                    @if($user->profile_photo_path)
                                        <div class="mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" 
                                                       id="remove_photo" name="remove_photo" value="1">
                                                <label class="form-check-label" for="remove_photo">
                                                    Remove current photo
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">User Settings</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">User Role <span class="text-danger">*</span></label>
                                    <div class="border rounded p-2">
                                        @foreach($roles as $role)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" 
                                                       name="roles[]" 
                                                       value="{{ $role->id }}" 
                                                       id="role_{{ $role->id }}"
                                                       {{ in_array($role->id, old('roles', $user->roles->pluck('id')->toArray())) ? 'checked' : '' }}
                                                       {{ $role->name === 'super-admin' && !auth()->user()->hasRole('super-admin') ? 'disabled' : '' }}>
                                                <label class="form-check-label" for="role_{{ $role->id }}">
                                                    {{ ucfirst($role->name) }}
                                                    @if($role->name === 'super-admin')
                                                        <span class="badge bg-danger">Restricted</span>
                                                    @endif
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('roles')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" 
                                               id="is_active" name="is_active" value="1"
                                               {{ old('is_active', $user->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">Active Account</label>
                                    </div>
                                    <div class="form-text">Deactivating will prevent user login.</div>
                                </div>

                                @if(!$user->hasVerifiedEmail())
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" 
                                                   id="email_verified" name="email_verified" value="1"
                                                   {{ old('email_verified') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="email_verified">Mark Email as Verified</label>
                                        </div>
                                        <div class="form-text">Bypass email verification.</div>
                                    </div>
                                @endif

                                @if($user->id !== auth()->id())
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" 
                                                   id="force_password_reset" name="force_password_reset" value="1"
                                                   {{ old('force_password_reset') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="force_password_reset">Require Password Reset</label>
                                        </div>
                                        <div class="form-text">User must change password on next login.</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-undo me-1"></i> Reset Changes
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Update User
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if($user->id !== auth()->id())
        <div class="card shadow mb-4 border-danger">
            <div class="card-header bg-danger text-white">
                <h6 class="m-0 font-weight-bold">Danger Zone</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-danger mb-1">Delete This User</h6>
                        <p class="mb-0">Once deleted, this action cannot be undone. All user data will be permanently removed.</p>
                    </div>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                        <i class="fas fa-trash-alt me-1"></i> Delete User
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Delete User Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">Confirm User Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to permanently delete <strong>{{ $user->name }}</strong>?</p>
                    <p class="text-danger">This action cannot be undone. All user data will be permanently removed.</p>
                    
                    <div class="mb-3">
                        <label for="delete_option" class="form-label">Delete Option:</label>
                        <select class="form-select" id="delete_option" name="delete_option" required>
                            <option value="all">Delete user and all associated data</option>
                            <option value="reassign">Reassign content to another user</option>
                        </select>
                    </div>
                    
                    <div id="reassignUserContainer" class="mb-3 d-none">
                        <label for="reassign_user_id" class="form-label">Reassign to User:</label>
                        <select class="form-select" id="reassign_user_id" name="reassign_user_id">
                            @foreach($allUsers as $u)
                                @if($u->id !== $user->id)
                                    <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->email }})</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt me-1"></i> Delete User
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
            preview.src = "{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('images/default-avatar.png') }}";
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Show/hide reassign user dropdown based on delete option
        const deleteOption = document.getElementById('delete_option');
        const reassignContainer = document.getElementById('reassignUserContainer');
        
        if (deleteOption && reassignContainer) {
            deleteOption.addEventListener('change', function() {
                if (this.value === 'reassign') {
                    reassignContainer.classList.remove('d-none');
                    reassignContainer.querySelector('select').setAttribute('required', 'required');
                } else {
                    reassignContainer.classList.add('d-none');
                    reassignContainer.querySelector('select').removeAttribute('required');
                }
            });
            
            // Trigger change event to set initial state
            deleteOption.dispatchEvent(new Event('change'));
        }
    });
</script>
@endpush
@endsection
