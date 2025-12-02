@extends('layouts.admin')

@section('title', 'Application Details')

@section('header')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Application Details</h2>
        <p class="text-gray-600">Application #{{ str_pad($application->id, 6, '0', STR_PAD_LEFT) }}</p>
    </div>
    <a href="{{ route('admin.digital-skill-applications.index') }}" 
       class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        Back to Applications
    </a>
</div>
@endsection

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Application Details -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Applicant Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Full Name</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $application->full_name }}</p>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email Address</label>
                    <p class="mt-1 text-sm text-gray-900">
                        <a href="mailto:{{ $application->email }}" class="text-blue-600 hover:text-blue-800">
                            {{ $application->email }}
                        </a>
                    </p>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <p class="mt-1 text-sm text-gray-900">
                        <a href="tel:{{ $application->phone }}" class="text-blue-600 hover:text-blue-800">
                            {{ $application->phone }}
                        </a>
                    </p>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Applied Date</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $application->applied_at->format('F j, Y \a\t g:i A') }}</p>
                </div>
            </div>

            <h3 class="text-lg font-semibold text-gray-900 mb-4">Program Information</h3>
            
            <div class="bg-gray-50 rounded-lg p-4 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Program Title</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $application->digitalSkill->title }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Level</label>
                        <p class="mt-1 text-sm text-gray-900">{{ ucfirst($application->digitalSkill->level) }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Duration</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $application->digitalSkill->duration_hours }} hours</p>
                    </div>
                    
                    @if($application->digitalSkill->price)
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Price</label>
                        <p class="mt-1 text-sm text-gray-900">MWK {{ number_format($application->digitalSkill->price, 2) }}</p>
                    </div>
                    @endif
                </div>
            </div>

            @if($application->message)
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Applicant's Message</h3>
            <div class="bg-blue-50 rounded-lg p-4 mb-6">
                <p class="text-sm text-gray-700">{{ $application->message }}</p>
            </div>
            @endif

            @if($application->admin_notes)
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Admin Notes</h3>
            <div class="bg-yellow-50 rounded-lg p-4 mb-6">
                <p class="text-sm text-gray-700">{{ $application->admin_notes }}</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Status Management -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Application Status</h3>
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Status</label>
                @switch($application->status)
                    @case('pending')
                        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            Pending Review
                        </span>
                        @break
                    @case('approved')
                        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                            Approved
                        </span>
                        @break
                    @case('rejected')
                        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                            Rejected
                        </span>
                        @break
                    @case('completed')
                        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                            Completed
                        </span>
                        @break
                @endswitch
            </div>

            <form action="{{ route('admin.digital-skill-applications.updateStatus', $application) }}" method="POST">
                @csrf
                @method('PATCH')
                
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Update Status</label>
                    <select name="status" id="status" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="pending" {{ $application->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ $application->status === 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                        <option value="completed" {{ $application->status === 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="admin_notes" class="block text-sm font-medium text-gray-700 mb-2">Admin Notes</label>
                    <textarea name="admin_notes" id="admin_notes" rows="4" 
                              class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                              placeholder="Add notes about this application...">{{ $application->admin_notes }}</textarea>
                </div>
                
                <button type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update Status
                </button>
            </form>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow-sm p-6 mt-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
            
            <div class="space-y-2">
                <a href="mailto:{{ $application->email }}" 
                   class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-center block">
                    Send Email
                </a>
                
                <a href="tel:{{ $application->phone }}" 
                   class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center block">
                    Call Applicant
                </a>
            </div>
        </div>
    </div>
</div>
@endsection