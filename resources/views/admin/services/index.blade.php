@extends('layouts.admin')

@section('title', 'Services Management')

@section('header')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Services Management</h2>
        <p class="text-gray-600">Manage your business services and offerings</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center transition-colors duration-200">
        <i class="fas fa-plus mr-2"></i>
        Add New Service
    </a>
</div>
@stop

@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($services as $service)
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                @if($service->icon)
                                    <span class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                        <i class="{{ $service->icon }} text-blue-600"></i>
                                    </span>
                                @else
                                    <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                                        <span class="text-sm font-medium text-gray-700">{{ substr($service->name, 0, 2) }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $service->name }}</div>
                                <div class="text-sm text-gray-500">{{ $service->slug }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">
                            {{ $service->category ?? 'General' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ Str::limit($service->short_description ?? $service->description, 60) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            {{ $service->price ? 'MWK ' . number_format($service->price, 0) : 'Variable' }}
                        </div>
                        @if($service->price && $service->original_price)
                            <div class="text-xs text-gray-500 line-through">MWK {{ number_format($service->original_price, 0) }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full
                            @if($service->is_active) bg-green-100 text-green-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ $service->is_active ? 'Active' : 'Inactive' }}
                        </span>
                        @if($service->is_featured)
                            <span class="ml-1 px-2 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Featured
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center justify-end space-x-2">
                            <a href="{{ route('admin.services.show', $service) }}" 
                               class="text-gray-400 hover:text-gray-600 p-1 rounded-full hover:bg-gray-100" 
                               title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.services.edit', $service) }}" 
                               class="text-blue-500 hover:text-blue-700 p-1 rounded-full hover:bg-blue-50" 
                               title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this service? This action cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-500 hover:text-red-700 p-1 rounded-full hover:bg-red-50" 
                                        title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-concierge-bell text-4xl text-gray-300 mb-2"></i>
                            <p class="text-lg font-medium text-gray-700">No services found</p>
                            <p class="text-sm text-gray-500 mt-1">Get started by adding your first service</p>
                            <a href="{{ route('admin.services.create') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <i class="fas fa-plus mr-2"></i>
                                Add Service
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($services->hasPages())
    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
        {{ $services->links() }}
    </div>
    @endif
</div>

@if(session('success'))
<div class="mt-4 p-4 bg-green-50 border-l-4 border-green-400">
    <div class="flex">
        <div class="flex-shrink-0">
            <i class="fas fa-check-circle text-green-400"></i>
        </div>
        <div class="ml-3">
            <p class="text-sm text-green-700">
                {{ session('success') }}
            </p>
        </div>
    </div>
</div>
@endif
@stop
