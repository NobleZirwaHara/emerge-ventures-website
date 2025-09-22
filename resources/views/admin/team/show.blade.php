@extends('layouts.admin')

@section('title', 'View Team Member')

@section('header')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">View Team Member</h2>
        <p class="text-gray-600">Details for "{{ $teamMember->name }}"</p>
    </div>
    <div class="flex space-x-2">
        <a href="{{ route('admin.team.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Team
        </a>
        <a href="{{ route('admin.team.edit', $teamMember->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center">
            <i class="fas fa-edit mr-2"></i>
            Edit Member
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="p-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                 @if($teamMember->photo)
                    <img src="{{ asset($teamMember->photo) }}" alt="{{ $teamMember->name }}" class="w-48 h-48 object-cover rounded-full mx-auto mb-4">
                @else
                    <div class="w-48 h-48 rounded-full bg-gray-300 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user text-gray-500 text-6xl"></i>
                    </div>
                @endif
                <h3 class="text-2xl font-bold text-gray-900">{{ $teamMember->name }}</h3>
                <p class="text-gray-600">{{ $teamMember->position }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4 border-b pb-3">Details</h3>
                 <div class="space-y-4">
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-700">Experience:</span>
                        <span class="text-gray-900">{{ $teamMember->experience_years ? $teamMember->experience_years . ' years' : 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-700">Email:</span>
                        <a href="mailto:{{ $teamMember->email }}" class="text-blue-600 hover:underline">{{ $teamMember->email }}</a>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="font-medium text-gray-700">Status:</span>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $teamMember->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $teamMember->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                     <div class="flex justify-between">
                        <span class="font-medium text-gray-700">Sort Order:</span>
                        <span class="text-gray-900">{{ $teamMember->sort_order }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <form action="{{ route('admin.team.destroy', $teamMember->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this team member? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                        <i class="fas fa-trash mr-2"></i> Delete Member
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4 border-b pb-3">Biography</h3>
                <div class="prose max-w-none text-gray-600">
                    {!! $teamMember->bio ?: '<p>No biography provided.</p>' !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
