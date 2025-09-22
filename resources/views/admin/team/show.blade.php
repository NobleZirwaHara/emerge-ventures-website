@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Team Member: {{ $teamMember->name }}</h1>
        <div>
            <a href="{{ route('admin.team-members.edit', $teamMember->id) }}" class="btn btn-outline-primary me-2">
                <i class="fas fa-edit me-1"></i> Edit
            </a>
            <a href="{{ route('admin.team-members.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back to List
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    @if($teamMember->photo)
                        <img src="{{ asset('storage/' . $teamMember->photo) }}"
                             alt="{{ $teamMember->name }}"
                             class="img-fluid rounded-circle mb-3"
                             style="width: 200px; height: 200px; object-fit: cover;">
                    @else
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mx-auto mb-3"
                             style="width: 200px; height: 200px;">
                            <i class="fas fa-user text-white" style="font-size: 5rem;"></i>
                        </div>
                    @endif

                    <h4 class="mb-1">{{ $teamMember->name }}</h4>
                    <p class="text-muted mb-3">{{ $teamMember->position }}</p>

                    <div class="d-flex justify-content-center gap-3 mb-3">
                        @if($teamMember->email)
                            <a href="mailto:{{ $teamMember->email }}" class="text-dark" data-bs-toggle="tooltip" title="Email">
                                <i class="fas fa-envelope fa-lg"></i>
                            </a>
                        @endif

                        @if($teamMember->phone)
                            <a href="tel:{{ $teamMember->phone }}" class="text-dark" data-bs-toggle="tooltip" title="Call">
                                <i class="fas fa-phone fa-lg"></i>
                            </a>
                        @endif

                        @if($teamMember->facebook)
                            <a href="{{ $teamMember->facebook }}" target="_blank" class="text-primary" data-bs-toggle="tooltip" title="Facebook">
                                <i class="fab fa-facebook-f fa-lg"></i>
                            </a>
                        @endif

                        @if($teamMember->twitter)
                            <a href="{{ $teamMember->twitter }}" target="_blank" class="text-info" data-bs-toggle="tooltip" title="Twitter">
                                <i class="fab fa-twitter fa-lg"></i>
                            </a>
                        @endif

                        @if($teamMember->linkedin)
                            <a href="{{ $teamMember->linkedin }}" target="_blank" class="text-primary" data-bs-toggle="tooltip" title="LinkedIn">
                                <i class="fab fa-linkedin-in fa-lg"></i>
                            </a>
                        @endif

                        @if($teamMember->instagram)
                            <a href="{{ $teamMember->instagram }}" target="_blank" class="text-danger" data-bs-toggle="tooltip" title="Instagram">
                                <i class="fab fa-instagram fa-lg"></i>
                            </a>
                        @endif
                    </div>

                    <div class="d-grid gap-2">
                        <span class="badge {{ $teamMember->is_active ? 'bg-success' : 'bg-secondary' }} mb-2">
                            {{ $teamMember->is_active ? 'Active' : 'Inactive' }}
                        </span>

                        @if($teamMember->show_on_team_page)
                            <span class="badge bg-primary mb-2">Shown on Team Page</span>
                        @endif

                        @if($teamMember->show_on_about_page)
                            <span class="badge bg-info text-dark mb-2">Shown on About Page</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header">
                    <h5 class="mb-0">Member Details</h5>
                </div>
                <div class="card-body
                    <table class="table table-sm">
                        <tr>
                            <th>ID</th>
                            <td>{{ $teamMember->id }}</td>
                        </tr>
                        <tr>
                            <th>Display Order</th>
                            <td>{{ $teamMember->display_order }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $teamMember->created_at->format('M d, Y h:i A') }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $teamMember->updated_at->format('M d, Y h:i A') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Bio</h5>
                </div>
                <div class="card-body">
                    @if($teamMember->bio)
                        {!! nl2br(e($teamMember->bio)) !!}
                    @else
                        <p class="text-muted mb-0">No bio available.</p>
                    @endif
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header">
                    <h5 class="mb-0">Contact Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Email</h6>
                            <p>
                                @if($teamMember->email)
                                    <a href="mailto:{{ $teamMember->email }}">{{ $teamMember->email }}</a>
                                @else
                                    <span class="text-muted">Not provided</span>
                                @endif
                            </p>

                            <h6>Phone</h6>
                            <p>
                                @if($teamMember->phone)
                                    <a href="tel:{{ $teamMember->phone }}">{{ $teamMember->phone }}</a>
                                @else
                                    <span class="text-muted">Not provided</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6>Social Profiles</h6>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    @if($teamMember->facebook)
                                        <a href="{{ $teamMember->facebook }}" target="_blank" class="text-decoration-none">
                                            <i class="fab fa-facebook-f me-2"></i> Facebook
                                        </a>
                                    @else
                                        <span class="text-muted">
                                            <i class="fab fa-facebook-f me-2"></i> Not provided
                                        </span>
                                    @endif
                                </li>
                                <li class="mb-2">
                                    @if($teamMember->twitter)
                                        <a href="{{ $teamMember->twitter }}" target="_blank" class="text-decoration-none">
                                            <i class="fab fa-twitter me-2"></i> Twitter
                                        </a>
                                    @else
                                        <span class="text-muted">
                                            <i class="fab fa-twitter me-2"></i> Not provided
                                        </span>
                                    @endif
                                </li>
                                <li class="mb-2">
                                    @if($teamMember->linkedin)
                                        <a href="{{ $teamMember->linkedin }}" target="_blank" class="text-decoration-none">
                                            <i class="fab fa-linkedin-in me-2"></i> LinkedIn
                                        </a>
                                    @else
                                        <span class="text-muted">
                                            <i class="fab fa-linkedin-in me-2"></i> Not provided
                                        </span>
                                    @endif
                                </li>
                                <li>
                                    @if($teamMember->instagram)
                                        <a href="{{ $teamMember->instagram }}" target="_blank" class="text-decoration-none">
                                            <i class="fab fa-instagram me-2"></i> Instagram
                                        </a>
                                    @else
                                        <span class="text-muted">
                                            <i class="fab fa-instagram me-2"></i> Not provided
                                        </span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4">
        <div>
            <a href="{{ route('admin.team-members.edit', $teamMember->id) }}" class="btn btn-primary me-2">
                <i class="fas fa-edit me-1"></i> Edit Team Member
            </a>
        </div>

        <div>
            <form action="{{ route('admin.team-members.destroy', $teamMember->id) }}"
                  method="POST"
                  class="d-inline"
                  onsubmit="return confirm('Are you sure you want to delete this team member? This action cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">
                    <i class="fas fa-trash me-1"></i> Delete Team Member
                </button>
            </form>
        </div>
    </div>
</div>

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
