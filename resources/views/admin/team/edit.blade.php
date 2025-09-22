@extends('layouts.admin')

@section('title', 'Edit Team Member')

@section('header')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Edit Team Member</h2>
        <p class="text-gray-600">Update details for "{{ $teamMember->name }}"</p>
    </div>
    <a href="{{ route('admin.team.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 flex items-center">
        <i class="fas fa-arrow-left mr-2"></i>
        Back to Team
    </a>
</div>
@endsection

@section('content')
<form action="{{ route('admin.team.update', $teamMember->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Basic Information</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name', $teamMember->name) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('name') border-red-500 @enderror">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="position" class="block text-sm font-medium text-gray-700">Position <span class="text-red-500">*</span></label>
                        <input type="text" id="position" name="position" value="{{ old('position', $teamMember->position) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('position') border-red-500 @enderror">
                        @error('position') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email', $teamMember->email) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('email') border-red-500 @enderror">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                     <div>
                        <label for="experience_years" class="block text-sm font-medium text-gray-700">Years of Experience</label>
                        <input type="number" id="experience_years" name="experience_years" value="{{ old('experience_years', $teamMember->experience_years) }}" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('experience_years') border-red-500 @enderror">
                        @error('experience_years') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700">Biography</label>
                    <textarea id="bio" name="bio" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('bio') border-red-500 @enderror">{{ old('bio', $teamMember->bio) }}</textarea>
                    @error('bio') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Social Media</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="facebook" class="block text-sm font-medium text-gray-700">Facebook URL</label>
                        <input type="url" id="facebook" name="facebook" value="{{ old('facebook', $teamMember->facebook) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('facebook') border-red-500 @enderror">
                        @error('facebook') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="twitter" class="block text-sm font-medium text-gray-700">Twitter URL</label>
                        <input type="url" id="twitter" name="twitter" value="{{ old('twitter', $teamMember->twitter) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('twitter') border-red-500 @enderror">
                        @error('twitter') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="linkedin" class="block text-sm font-medium text-gray-700">LinkedIn URL</label>
                        <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin', $teamMember->linkedin) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('linkedin') border-red-500 @enderror">
                        @error('linkedin') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Profile Photo</h3>
                <div class="text-center">
                    <img id="photo-preview" src="{{ $teamMember->photo ? asset($teamMember->photo) : asset('assets/img/placeholder-user.jpg') }}" alt="Photo preview" class="w-48 h-48 object-cover rounded-full mx-auto mb-4">
                    <input type="file" id="photo" name="photo" accept="image/*" class="hidden @error('photo') border-red-500 @enderror" onchange="previewImage(event, 'photo-preview')">
                    <label for="photo" class="cursor-pointer bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        <i class="fas fa-upload mr-2"></i> Change Photo
                    </label>
                    <p class="text-xs text-gray-500 mt-2">Recommended: 400x400px.</p>
                    @error('photo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Settings</h3>

                 <div class="flex items-center justify-between mb-4">
                    <label for="sort_order" class="text-sm font-medium text-gray-700">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $teamMember->sort_order) }}" min="0" class="w-20 text-center rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="flex items-center justify-between">
                    <label for="is_active" class="text-sm font-medium text-gray-700">Active</label>
                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $teamMember->is_active) ? 'checked' : '' }} class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                        <label for="is_active" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 mb-2">
                    <i class="fas fa-save mr-2"></i> Update Member
                </button>
                <a href="{{ route('admin.team.index') }}" class="w-full text-center block bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300">
                    Cancel
                </a>
            </div>
        </div>
    </div>
</form>

<style>
.toggle-checkbox:checked {
  right: 0;
  border-color: #4A90E2;
}
.toggle-checkbox:checked + .toggle-label {
  background-color: #4A90E2;
}
</style>

@push('scripts')
<script>
    function previewImage(event, previewId) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById(previewId);
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endpush
@endsection
