@extends('layouts.admin')

@section('title', 'View Service')

@section('header')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">View Service</h2>
        <p class="text-gray-600">Details for "{{ $service->name }}"</p>
    </div>
    <div class="flex space-x-2">
        <a href="{{ route('admin.services.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Services
        </a>
        <a href="{{ route('admin.services.edit', $service->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center">
            <i class="fas fa-edit mr-2"></i>
            Edit Service
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="p-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-start">
                     @if($service->icon)
                        <span class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center mr-6">
                            <i class="{{ $service->icon }} text-blue-600 text-2xl"></i>
                        </span>
                    @endif
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $service->name }}</h3>
                        <div class="prose max-w-none text-gray-600">
                            {!! $service->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4 border-b pb-3">Service Details</h3>

                <div class="space-y-4">
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-700">Price:</span>
                        <span class="text-gray-900">{{ $service->price ? 'MWK ' . number_format($service->price, 0) : 'Variable' }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="font-medium text-gray-700">Status:</span>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $service->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $service->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                     <div class="flex justify-between">
                        <span class="font-medium text-gray-700">Created At:</span>
                        <span class="text-gray-900">{{ $service->created_at->format('M d, Y') }}</span>
                    </div>
                     <div class="flex justify-between">
                        <span class="font-medium text-gray-700">Last Updated:</span>
                        <span class="text-gray-900">{{ $service->updated_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>

            @if($service->image)
            <div class="bg-white p-6 rounded-lg shadow-md">
                 <h3 class="text-xl font-semibold mb-4 border-b pb-3">Service Image</h3>
                <img src="{{ asset($service->image) }}" alt="{{ $service->name }}" class="w-full h-auto object-cover rounded-lg">
            </div>
            @endif

            <div class="bg-white p-6 rounded-lg shadow-md">
                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                        <i class="fas fa-trash mr-2"></i> Delete Service
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
