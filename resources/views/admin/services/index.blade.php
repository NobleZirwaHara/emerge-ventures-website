@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Services</h1>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Add New Service
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->category->name ?? 'N/A' }}</td>
                                <td>{{ number_format($service->price, 2) }}</td>
                                <td>
                                    <span class="badge {{ $service->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $service->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.services.show', $service->id) }}" 
                                           class="btn btn-sm btn-outline-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.services.edit', $service->id) }}" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.services.destroy', $service->id) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('Are you sure you want to delete this service?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No services found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($services->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $services->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
