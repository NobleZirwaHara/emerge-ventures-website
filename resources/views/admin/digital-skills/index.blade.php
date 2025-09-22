@extends('layouts.admin')

@section('title', 'Digital Skills Management')

@section('header')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Digital Skills Management</h2>
        <p class="text-gray-600">Manage your digital skills training programs</p>
    </div>
    <a href="{{ route('admin.digital-skills.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center">
        <i class="fas fa-plus mr-2"></i>
        Add New Program
    </a>
</div>
@endsection

@section('content')
<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Program</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Level</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($digitalSkills as $skill)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            @if($skill->image)
                                <img src="{{ asset($skill->image) }}" alt="{{ $skill->title }}" class="h-10 w-10 rounded-full object-cover">
                            @else
                                <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-500"></i>
                                </div>
                            @endif
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">{{ $skill->title }}</div>
                            <div class="text-sm text-gray-500">{{ Str::limit($skill->short_description, 40) }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @php
                        $levelClasses = [
                            'beginner' => 'bg-blue-100 text-blue-800',
                            'intermediate' => 'bg-yellow-100 text-yellow-800',
                            'advanced' => 'bg-purple-100 text-purple-800'
                        ];
                    @endphp
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $levelClasses[$skill->level] ?? 'bg-gray-100 text-gray-800' }}">
                        {{ ucfirst($skill->level) }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $skill->price ? 'MWK ' . number_format($skill->price, 0) : 'Free' }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $skill->duration_hours ? $skill->duration_hours . ' hours' : 'N/A' }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                     <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                        @if($skill->is_active) bg-green-100 text-green-800
                        @else bg-red-100 text-red-800 @endif">
                        {{ $skill->is_active ? 'Active' : 'Inactive' }}
                    </span>
                    @if($skill->featured)
                        <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">
                            Featured
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <a href="{{ route('admin.digital-skills.show', $skill) }}" class="text-gray-600 hover:text-gray-900 mr-3" title="View"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.digital-skills.edit', $skill) }}" class="text-indigo-600 hover:text-indigo-900 mr-3" title="Edit"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.digital-skills.destroy', $skill) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')" title="Delete"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                    No digital skills found.
                    <a href="{{ route('admin.digital-skills.create') }}" class="text-blue-600 hover:text-blue-800">Add one now</a>.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $digitalSkills->links() }}
</div>
@endsection