@extends('layouts.admin')

@section('title', 'View Digital Skill')

@section('header')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">View Training Program</h2>
        <p class="text-gray-600">Details for "{{ $digitalSkill->title }}"</p>
    </div>
    <div class="flex space-x-2">
        <a href="{{ route('admin.digital-skills.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Programs
        </a>
        <a href="{{ route('admin.digital-skills.edit', $digitalSkill->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center">
            <i class="fas fa-edit mr-2"></i>
            Edit Program
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
                @if($digitalSkill->image)
                    <img src="{{ asset($digitalSkill->image) }}" alt="{{ $digitalSkill->title }}" class="w-full h-64 object-cover rounded-lg mb-6">
                @endif
                <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $digitalSkill->title }}</h3>
                <p class="text-gray-600 mb-6">{{ $digitalSkill->short_description }}</p>

                <div class="prose max-w-none">
                    {!! $digitalSkill->description !!}
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-lg font-semibold mb-3">Prerequisites</h4>
                    <ul class="list-disc list-inside space-y-1 text-gray-700">
                        @forelse($digitalSkill->prerequisites ?? [] as $item)
                            <li>{{ $item }}</li>
                        @empty
                            <li class="text-gray-500">No prerequisites required.</li>
                        @endforelse
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-lg font-semibold mb-3">Learning Outcomes</h4>
                    <ul class="list-disc list-inside space-y-1 text-gray-700">
                        @forelse($digitalSkill->learning_outcomes ?? [] as $item)
                            <li>{{ $item }}</li>
                        @empty
                            <li class="text-gray-500">No outcomes defined.</li>
                        @endforelse
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-lg font-semibold mb-3">Key Features</h4>
                    <ul class="list-disc list-inside space-y-1 text-gray-700">
                        @forelse($digitalSkill->features ?? [] as $item)
                            <li>{{ $item }}</li>
                        @empty
                            <li class="text-gray-500">No features specified.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4 border-b pb-3">Program Details</h3>

                <div class="space-y-4">
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-700">Level:</span>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{
                            match($digitalSkill->level) {
                                'beginner' => 'bg-blue-100 text-blue-800',
                                'intermediate' => 'bg-yellow-100 text-yellow-800',
                                'advanced' => 'bg-purple-100 text-purple-800',
                                default => 'bg-gray-100 text-gray-800'
                            }
                        }}">
                            {{ ucfirst($digitalSkill->level) }}
                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-700">Duration:</span>
                        <span class="text-gray-900">{{ $digitalSkill->duration_hours }} hours</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-700">Price:</span>
                        <span class="text-gray-900">{{ $digitalSkill->price ? 'MWK ' . number_format($digitalSkill->price, 0) : 'Free' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-700">Max Participants:</span>
                        <span class="text-gray-900">{{ $digitalSkill->max_participants ?? 'Unlimited' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-700">Start Date:</span>
                        <span class="text-gray-900">{{ $digitalSkill->start_date ? optional($digitalSkill->start_date)->format('M d, Y') : 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-700">End Date:</span>
                        <span class="text-gray-900">{{ $digitalSkill->end_date ? optional($digitalSkill->end_date)->format('M d, Y') : 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="font-medium text-gray-700">Status:</span>
                        <div>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $digitalSkill->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $digitalSkill->is_active ? 'Active' : 'Inactive' }}
                            </span>
                            @if($digitalSkill->featured)
                                <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">
                                    Featured
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <form action="{{ route('admin.digital-skills.destroy', $digitalSkill->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this program? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                        <i class="fas fa-trash mr-2"></i> Delete Program
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
