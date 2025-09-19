@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Workspace Booking Details</h1>
        <div>
            <a href="{{ route('admin.workspace-bookings.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back to Bookings
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Booking Information</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6>Booking Reference</h6>
                            <p class="text-muted">#{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</p>
                            
                            <h6>Workspace</h6>
                            <p>{{ $booking->workspace->name ?? 'N/A' }}</p>
                            
                            <h6>Date</h6>
                            <p>{{ $booking->booking_date->format('l, F j, Y') }}</p>
                            
                            <h6>Time Slot</h6>
                            <p>
                                {{ $booking->start_time->format('h:i A') }} - 
                                {{ $booking->end_time->format('h:i A') }}
                                ({{ $booking->duration }} hours)
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6>Status</h6>
                            @php
                                $statusClasses = [
                                    'pending' => 'bg-warning text-dark',
                                    'confirmed' => 'bg-success',
                                    'cancelled' => 'bg-danger',
                                    'completed' => 'bg-info'
                                ];
                            @endphp
                            <p>
                                <span class="badge {{ $statusClasses[$booking->status] ?? 'bg-secondary' }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </p>
                            
                            <h6>Booking Date</h6>
                            <p>{{ $booking->created_at->format('M j, Y h:i A') }}</p>
                            
                            <h6>Last Updated</h6>
                            <p>{{ $booking->updated_at->format('M j, Y h:i A') }}</p>
                            
                            @if($booking->cancelled_at)
                                <h6>Cancelled At</h6>
                                <p>{{ $booking->cancelled_at->format('M j, Y h:i A') }}</p>
                            @endif
                            
                            @if($booking->completed_at)
                                <h6>Completed At</h6>
                                <p>{{ $booking->completed_at->format('M j, Y h:i A') }}</p>
                            @endif
                        </div>
                    </div>
                    
                    @if($booking->special_requirements)
                        <div class="mb-4">
                            <h6>Special Requirements</h6>
                            <div class="border rounded p-3 bg-light">
                                {{ $booking->special_requirements }}
                            </div>
                        </div>
                    @endif
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            @if($booking->status == 'pending')
                                <form action="{{ route('admin.workspace-bookings.update-status', $booking->id) }}" 
                                      method="POST" class="d-inline me-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="confirmed">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-check me-1"></i> Confirm Booking
                                    </button>
                                </form>
                                
                                <form action="{{ route('admin.workspace-bookings.update-status', $booking->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="cancelled">
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="fas fa-times me-1"></i> Cancel Booking
                                    </button>
                                </form>
                            @elseif($booking->status == 'confirmed' && $booking->booking_date->isToday())
                                <form action="{{ route('admin.workspace-bookings.update-status', $booking->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="completed">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-check-double me-1"></i> Mark as Completed
                                    </button>
                                </form>
                            @endif
                        </div>
                        
                        <form action="{{ route('admin.workspace-bookings.destroy', $booking->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this booking? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fas fa-trash me-1"></i> Delete Booking
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="mb-0">Workspace Details</h5>
                </div>
                <div class="card-body">
                    @if($booking->workspace)
                        <div class="row">
                            <div class="col-md-4">
                                @if($booking->workspace->image)
                                    <img src="{{ asset('storage/' . $booking->workspace->image) }}" 
                                         alt="{{ $booking->workspace->name }}" 
                                         class="img-fluid rounded mb-3">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                         style="height: 150px;">
                                        <span class="text-muted">No image available</span>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h4>{{ $booking->workspace->name }}</h4>
                                <p class="text-muted">{{ $booking->workspace->type }}</p>
                                
                                <div class="mb-3">
                                    @if($booking->workspace->features)
                                        @foreach(explode(',', $booking->workspace->features) as $feature)
                                            <span class="badge bg-light text-dark me-1 mb-1">{{ trim($feature) }}</span>
                                        @endforeach
                                    @endif
                                </div>
                                
                                <p>{{ $booking->workspace->description }}</p>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="h5 mb-0">${{ number_format($booking->price, 2) }}</span>
                                        <span class="text-muted">/ {{ $booking->duration }} hours</span>
                                    </div>
                                    <a href="{{ route('admin.workspaces.edit', $booking->workspace_id) }}" 
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-external-link-alt me-1"></i> View Workspace
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning mb-0">
                            <i class="fas fa-exclamation-triangle me-1"></i>
                            The associated workspace is no longer available.
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="mb-0">User Information</h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto mb-2" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-user text-muted" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="mb-1">{{ $booking->user->name }}</h5>
                        <p class="text-muted mb-0">{{ $booking->user->email }}</p>
                        
                        @if($booking->user->phone)
                            <div class="mt-2">
                                <a href="tel:{{ $booking->user->phone }}" class="text-decoration-none">
                                    <i class="fas fa-phone-alt me-1"></i> {{ $booking->user->phone }}
                                </a>
                            </div>
                        @endif
                    </div>
                    
                    <div class="border-top pt-3">
                        <h6>User Type</h6>
                        <p class="mb-3">
                            @if($booking->user->hasRole('member'))
                                <span class="badge bg-primary">Member</span>
                            @else
                                <span class="badge bg-secondary">Guest</span>
                            @endif
                        </p>
                        
                        <h6>Member Since</h6>
                        <p class="mb-0">{{ $booking->user->created_at->format('M j, Y') }}</p>
                    </div>
                </div>
            </div>
            
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="mb-0">Billing Information</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal:</span>
                        <span>${{ number_format($booking->price, 2) }}</span>
                    </div>
                    
                    @if($booking->discount > 0)
                        <div class="d-flex justify-content-between mb-2">
                            <span>Discount:</span>
                            <span class="text-danger">-${{ number_format($booking->discount, 2) }}</span>
                        </div>
                    @endif
                    
                    <div class="d-flex justify-content-between mb-2">
                        <span>Tax ({{ $booking->tax_rate }}%):</span>
                        <span>${{ number_format($booking->tax_amount, 2) }}</span>
                    </div>
                    
                    <div class="d-flex justify-content-between fw-bold border-top pt-2 mt-2">
                        <span>Total:</span>
                        <span>${{ number_format($booking->total_amount, 2) }}</span>
                    </div>
                    
                    <div class="mt-3">
                        <h6>Payment Status</h6>
                        @if($booking->payment_status == 'paid')
                            <span class="badge bg-success">Paid</span>
                            @if($booking->payment_method)
                                <small class="text-muted ms-2">via {{ ucfirst($booking->payment_method) }}</small>
                            @endif
                            
                            @if($booking->paid_at)
                                <div class="mt-1">
                                    <small class="text-muted">
                                        Paid on {{ $booking->paid_at->format('M j, Y h:i A') }}
                                    </small>
                                </div>
                            @endif
                        @else
                            <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                    </div>
                    
                    @if($booking->invoice_number)
                        <div class="mt-3">
                            <h6>Invoice #</h6>
                            <p class="mb-0">{{ $booking->invoice_number }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-between align-items-center mt-4">
        <div>
            <a href="{{ route('admin.workspace-bookings.index') }}" class="btn btn-outline-secondary me-2">
                <i class="fas fa-arrow-left me-1"></i> Back to Bookings
            </a>
            
            @if($booking->status == 'pending' || $booking->status == 'confirmed')
                <a href="{{ route('admin.workspace-bookings.edit', $booking->id) }}" class="btn btn-outline-primary me-2">
                    <i class="fas fa-edit me-1"></i> Edit Booking
                </a>
            @endif
        </div>
        
        <div>
            @if($booking->status == 'confirmed' && $booking->payment_status == 'paid')
                <a href="{{ route('admin.workspace-bookings.invoice', $booking->id) }}" 
                   class="btn btn-outline-info me-2" target="_blank">
                    <i class="fas fa-file-invoice me-1"></i> View Invoice
                </a>
            @endif
            
            <form action="{{ route('admin.workspace-bookings.destroy', $booking->id) }}" 
                  method="POST" 
                  class="d-inline"
                  onsubmit="return confirm('Are you sure you want to delete this booking? This action cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">
                    <i class="fas fa-trash me-1"></i> Delete Booking
                </button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize any plugins or custom scripts
    });
</script>
@endpush
@endsection
