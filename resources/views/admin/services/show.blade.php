@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Service Details</h1>
        <div>
            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-outline-primary me-2">
                <i class="fas fa-edit me-1"></i> Edit
            </a>
            <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back to List
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Service Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">ID</th>
                            <td>{{ $service->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $service->name }}</td>
                        </tr>
                        <tr>
                            <th>Slug</th>
                            <td>{{ $service->slug }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $service->category->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>${{ number_format($service->price, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge {{ $service->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $service->is_active ? 'Active' : 'Inactive' }}
                                </span>
                                @if($service->is_featured)
                                    <span class="badge bg-warning text-dark ms-2">Featured</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $service->created_at->format('M d, Y h:i A') }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $service->updated_at->format('M d, Y h:i A') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Description</h5>
                </div>
                <div class="card-body">
                    {!! $service->description ? nl2br(e($service->description)) : '<p class="text-muted">No description provided.</p>' !!}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Featured Image</h5>
                </div>
                <div class="card-body text-center">
                    @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" 
                             alt="{{ $service->name }}" 
                             class="img-fluid rounded mb-3" 
                             style="max-height: 250px;">
                    @else
                        <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                             style="height: 200px;">
                            <span class="text-muted">No image available</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header">
                    <h5 class="mb-0">Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.services.edit', $service->id) }}" 
                           class="btn btn-outline-primary mb-2">
                            <i class="fas fa-edit me-1"></i> Edit Service
                        </a>
                        
                        <form action="{{ route('admin.services.destroy', $service->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this service? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger w-100">
                                <i class="fas fa-trash me-1"></i> Delete Service
                            </button>
                        </form>
                    </div>
                </div>
            </div>
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
