@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">User Details: {{ $user->name }}</h1>
        <div>
            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary me-2">
                <i class="fas fa-edit me-1"></i> Edit User
            </a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back to Users
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <img src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('images/default-avatar.png') }}" 
                             alt="{{ $user->name }}" 
                             class="rounded-circle border" 
                             style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <h4>{{ $user->name }}</h4>
                    <p class="text-muted">{{ $user->email }}</p>
                    
                    <div class="d-flex justify-content-center gap-2 mb-3">
                        @if($user->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                        
                        @if($user->is_banned)
                            <span class="badge bg-danger">Banned</span>
                        @endif
                        
                        @if($user->email_verified_at)
                            <span class="badge bg-success" data-bs-toggle="tooltip" title="Email Verified">
                                <i class="fas fa-check-circle"></i>
                            </span>
                        @else
                            <span class="badge bg-warning text-dark" data-bs-toggle="tooltip" title="Email Not Verified">
                                <i class="fas fa-exclamation-circle"></i>
                            </span>
                        @endif
                    </div>
                    
                    <div class="d-grid gap-2">
                        @if($user->id !== auth()->id())
                            @if($user->is_banned)
                                <form action="{{ route('admin.users.unban', $user->id) }}" method="POST" class="d-grid">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fas fa-user-check me-1"></i> Unban User
                                    </button>
                                </form>
                            @else
                                <button type="button" class="btn btn-warning btn-sm" 
                                        data-bs-toggle="modal" data-bs-target="#banUserModal">
                                    <i class="fas fa-user-slash me-1"></i> Ban User
                                </button>
                            @endif
                            
                            <form action="{{ route('admin.users.impersonate', $user->id) }}" method="POST" class="d-grid">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-sign-in-alt me-1"></i> Login as User
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">User Roles</h6>
                </div>
                <div class="card-body">
                    @if($user->roles->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach($user->roles as $role)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ ucfirst($role->name) }}</span>
                                    <span class="badge bg-primary rounded-pill">{{ $role->permissions->count() }} Permissions</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="alert alert-warning mb-0">No roles assigned.</div>
                    @endif
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Account Status</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Account Status</span>
                            @if($user->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Email Verified</span>
                            @if($user->email_verified_at)
                                <span class="badge bg-success">
                                    <i class="fas fa-check-circle"></i> {{ $user->email_verified_at->diffForHumans() }}
                                </span>
                            @else
                                <span class="badge bg-warning text-dark">Not Verified</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Last Login</span>
                            @if($user->last_login_at)
                                <span class="text-muted">{{ $user->last_login_at->diffForHumans() }}</span>
                            @else
                                <span class="text-muted">Never</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Last Login IP</span>
                            <span class="text-muted">{{ $user->last_login_ip ?? 'N/A' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Member Since</span>
                            <span class="text-muted">{{ $user->created_at->format('M d, Y') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Profile Information</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted">Personal Information</h6>
                            <table class="table table-borderless table-sm">
                                <tr>
                                    <th width="40%">Full Name:</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>
                                        {{ $user->email }}
                                        @if($user->email_verified_at)
                                            <span class="badge bg-success" data-bs-toggle="tooltip" title="Verified">
                                                <i class="fas fa-check-circle"></i>
                                            </span>
                                        @else
                                            <span class="badge bg-warning text-dark" data-bs-toggle="tooltip" title="Unverified">
                                                <i class="fas fa-exclamation-circle"></i>
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @if($user->phone)
                                <tr>
                                    <th>Phone:</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                @endif
                                @if($user->date_of_birth)
                                <tr>
                                    <th>Date of Birth:</th>
                                    <td>{{ $user->date_of_birth->format('F d, Y') }} ({{ $user->age }} years old)</td>
                                </tr>
                                @endif
                                @if($user->gender)
                                <tr>
                                    <th>Gender:</th>
                                    <td>{{ ucfirst($user->gender) }}</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Contact Information</h6>
                            <table class="table table-borderless table-sm">
                                @if($user->address)
                                <tr>
                                    <th width="40%">Address:</th>
                                    <td>{{ $user->address }}</td>
                                </tr>
                                @endif
                                @if($user->city)
                                <tr>
                                    <th>City:</th>
                                    <td>{{ $user->city }}</td>
                                </tr>
                                @endif
                                @if($user->state)
                                <tr>
                                    <th>State/Region:</th>
                                    <td>{{ $user->state }}</td>
                                </tr>
                                @endif
                                @if($user->postal_code)
                                <tr>
                                    <th>Postal Code:</th>
                                    <td>{{ $user->postal_code }}</td>
                                </tr>
                                @endif
                                @if($user->country)
                                <tr>
                                    <th>Country:</th>
                                    <td>{{ $user->country_name ?? $user->country }}</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>

                    @if($user->bio)
                    <div class="mb-4">
                        <h6 class="text-muted">Biography</h6>
                        <div class="p-3 bg-light rounded">
                            {!! nl2br(e($user->bio)) !!}
                        </div>
                    </div>
                    @endif

                    <div class="mb-4">
                        <h6 class="text-muted">Social Profiles</h6>
                        <div class="d-flex gap-2">
                            @if($user->facebook_url)
                                <a href="{{ $user->facebook_url }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif
                            @if($user->twitter_url)
                                <a href="{{ $user->twitter_url }}" target="_blank" class="btn btn-outline-info btn-sm">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif
                            @if($user->instagram_url)
                                <a href="{{ $user->instagram_url }}" target="_blank" class="btn btn-outline-danger btn-sm">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
                            @if($user->linkedin_url)
                                <a href="{{ $user->linkedin_url }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            @endif
                            @if($user->youtube_url)
                                <a href="{{ $user->youtube_url }}" target="_blank" class="btn btn-outline-danger btn-sm">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            @endif
                            @if($user->website_url)
                                <a href="{{ $user->website_url }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-globe"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold">Activity Log</h6>
                    <small>Last 5 activities</small>
                </div>
                <div class="card-body">
                    @if($activities->count() > 0)
                        <div class="timeline">
                            @foreach($activities as $activity)
                                <div class="timeline-item">
                                    <div class="timeline-marker"></div>
                                    <div class="timeline-content">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1">{{ $activity->description }}</h6>
                                            <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                                        </div>
                                        @if($activity->properties->count() > 0)
                                            <div class="small text-muted mt-1">
                                                @foreach($activity->properties as $key => $value)
                                                    @if(!in_array($key, ['attributes', 'old', 'ip_address', 'user_agent', 'url', 'method']))
                                                        <div><strong>{{ ucfirst($key) }}:</strong> {{ is_array($value) ? json_encode($value) : $value }}</div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                        @if(isset($activity->properties['ip_address']))
                                            <div class="small text-muted mt-1">
                                                <span>{{ $activity->properties['ip_address'] }}</span>
                                                @if(isset($activity->properties['user_agent']))
                                                    <span class="ms-2">• {{ $activity->properties['user_agent'] }}</span>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if($activities->hasMorePages())
                            <div class="text-center mt-3">
                                <a href="{{ route('admin.users.activity', $user->id) }}" class="btn btn-sm btn-outline-primary">
                                    View All Activity
                                </a>
                            </div>
                        @endif
                    @else
                        <div class="alert alert-info mb-0">No activity found for this user.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if(!$user->is_banned)
<!-- Ban User Modal -->
<div class="modal fade" id="banUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.users.ban', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title">Ban User: {{ $user->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>You are about to ban this user. Please provide a reason for this action.</p>
                    <div class="mb-3">
                        <label for="ban_reason" class="form-label">Reason for Ban</label>
                        <textarea class="form-control" id="ban_reason" name="ban_reason" rows="3" required></textarea>
                        <div class="form-text">This message will be visible to the user.</div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="delete_posts" name="delete_posts">
                            <label class="form-check-label" for="delete_posts">
                                Delete user's posts and content
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Confirm Ban</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@push('styles')
<style>
    .timeline {
        position: relative;
        padding-left: 2rem;
        margin: 0 0 0 1rem;
        border-left: 2px solid #e9ecef;
    }
    .timeline-item {
        position: relative;
        padding-bottom: 1.5rem;
    }
    .timeline-marker {
        position: absolute;
        left: -2.5rem;
        width: 1rem;
        height: 1rem;
        border-radius: 50%;
        background-color: #0d6efd;
        top: 0.25rem;
    }
    .timeline-content {
        padding: 0.5rem 0;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endpush
@endsection
