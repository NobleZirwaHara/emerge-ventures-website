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
<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Entrepreneur</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Business</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Industry</th>
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
                    <div class="text-sm font-medium text-gray-900">{{ $entrepreneur->business_name }}</div>
                    <div class="text-sm text-gray-500">{{ $entrepreneur->location }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $entrepreneur->industry }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <form action="{{ route('admin.entrepreneurs.updateStatus', $entrepreneur) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <select name="status" onchange="this.form.submit()" class="text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                            @if($entrepreneur->status === 'approved') bg-green-100 text-green-800
                            @elseif($entrepreneur->status === 'rejected') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            <option value="pending" {{ $entrepreneur->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $entrepreneur->status === 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ $entrepreneur->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </form>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <a href="{{ route('admin.entrepreneurs.show', $entrepreneur) }}" class="text-gray-600 hover:text-gray-900 mr-3" title="View"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.entrepreneurs.edit', $entrepreneur) }}" class="text-indigo-600 hover:text-indigo-900 mr-3" title="Edit"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.entrepreneurs.destroy', $entrepreneur) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No entrepreneurs found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $entrepreneurs->links() }}
</div>
@endsection