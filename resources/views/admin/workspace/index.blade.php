@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Workspace Bookings</h1>
    </div>

    <div class="card shadow">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="mb-3">
                <form action="{{ route('admin.workspace-bookings.index') }}" method="GET" class="row g-3">
                    <div class="col-md-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" onchange="this.form.submit()">
                            <option value="">All Statuses</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" name="date" id="date" class="form-control" 
                               value="{{ request('date') }}" onchange="this.form.submit()">
                    </div>
                    <div class="col-md-3">
                        <label for="search" class="form-label">Search</label>
                        <div class="input-group">
                            <input type="text" name="search" id="search" class="form-control" 
                                   placeholder="Search by name or email" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <a href="{{ route('admin.workspace-bookings.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-sync-alt me-1"></i> Reset
                        </a>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Workspace</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td>{{ $loop->iteration + (($bookings->currentPage() - 1) * $bookings->perPage()) }}</td>
                                <td>
                                    <div>{{ $booking->user->name }}</div>
                                    <small class="text-muted">{{ $booking->user->email }}</small>
                                </td>
                                <td>{{ $booking->workspace->name ?? 'N/A' }}</td>
                                <td>{{ $booking->booking_date->format('M d, Y') }}</td>
                                <td>
                                    {{ $booking->start_time->format('h:i A') }} - 
                                    {{ $booking->end_time->format('h:i A') }}
                                </td>
                                <td>{{ $booking->duration }} hours</td>
                                <td>
                                    @php
                                        $statusClasses = [
                                            'pending' => 'bg-warning text-dark',
                                            'confirmed' => 'bg-success',
                                            'cancelled' => 'bg-danger',
                                            'completed' => 'bg-info'
                                        ];
                                    @endphp
                                    <span class="badge {{ $statusClasses[$booking->status] ?? 'bg-secondary' }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.workspace-bookings.show', $booking->id) }}" 
                                           class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if($booking->status == 'pending')
                                            <form action="{{ route('admin.workspace-bookings.update-status', $booking->id) }}" 
                                                  method="POST" class="d-inline" 
                                                  onsubmit="return confirm('Are you sure you want to confirm this booking?')">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="confirmed">
                                                <button type="submit" class="btn btn-sm btn-outline-success" data-bs-toggle="tooltip" title="Confirm">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                            
                                            <form action="{{ route('admin.workspace-bookings.update-status', $booking->id) }}" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to cancel this booking?')">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="cancelled">
                                                <button type="submit" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Cancel">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        @endif
                                        
                                        @if($booking->status == 'confirmed' && $booking->booking_date->isToday())
                                            <form action="{{ route('admin.workspace-bookings.update-status', $booking->id) }}" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Mark this booking as completed?')">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="completed">
                                                <button type="submit" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="Mark as Completed">
                                                    <i class="fas fa-check-double"></i>
                                                </button>
                                            </form>
                                        @endif
                                        
                                        <form action="{{ route('admin.workspace-bookings.destroy', $booking->id) }}" 
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this booking?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($bookings->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $bookings->withQueryString()->links() }}
                </div>
            @endif
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
        
        // Set today's date as default if no date is selected
        @if(!request('date'))
            document.getElementById('date').valueAsDate = new Date();
        @endif
    });
</script>
@endpush
@endsection
