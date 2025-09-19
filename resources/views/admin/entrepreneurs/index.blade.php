@extends('layouts.admin')

@section('title', 'Entrepreneurs Management')

@section('header')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Entrepreneurs Management</h2>
        <p class="text-gray-600">Manage entrepreneur profiles and applications</p>
    </div>
    <a href="{{ route('admin.entrepreneurs.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center">
        <i class="fas fa-plus mr-2"></i>
        Add New Entrepreneur
    </a>
</div>
@endsection

@section('content')

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Entrepreneur</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Business</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Industry</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($entrepreneurs as $entrepreneur)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @if($entrepreneur->profile_image)
                                            <img class="h-10 w-10 rounded-full object-cover" src="{{ asset($entrepreneur->profile_image) }}" alt="{{ $entrepreneur->name }}">
                                        @else
                                            <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                <span class="text-sm font-medium text-gray-700">{{ substr($entrepreneur->name, 0, 2) }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $entrepreneur->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $entrepreneur->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    @if($entrepreneur->business_logo)
                                        <img class="h-8 w-8 rounded object-cover mr-2" src="{{ asset($entrepreneur->business_logo) }}" alt="{{ $entrepreneur->business_name }}">
                                    @endif
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $entrepreneur->business_name }}</div>
                                        @if($entrepreneur->role)
                                            <div class="text-sm text-gray-500">{{ $entrepreneur->role }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $entrepreneur->industry }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $entrepreneur->location }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($entrepreneur->status === 'approved') bg-green-100 text-green-800
                                    @elseif($entrepreneur->status === 'rejected') bg-red-100 text-red-800
                                    @else bg-yellow-100 text-yellow-800 @endif">
                                    {{ ucfirst($entrepreneur->status) }}
                                </span>
                                @if($entrepreneur->featured)
                                    <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                        Featured
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.entrepreneurs.show', $entrepreneur) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                                <form action="{{ route('admin.entrepreneurs.updateStatus', $entrepreneur) }}" method="POST" class="inline mr-3">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="text-sm border-gray-300 rounded">
                                        <option value="pending" {{ $entrepreneur->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="approved" {{ $entrepreneur->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="rejected" {{ $entrepreneur->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </form>
                                <form action="{{ route('admin.entrepreneurs.destroy', $entrepreneur) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">No entrepreneurs found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $entrepreneurs->links() }}
            </div>
@endsection