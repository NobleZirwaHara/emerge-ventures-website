@extends('layouts.admin')

@section('title', 'Edit Service')

@section('header')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Edit Service</h2>
        <p class="text-gray-600">Update details for "{{ $service->name }}"</p>
    </div>
    <a href="{{ route('admin.services.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 flex items-center">
        <i class="fas fa-arrow-left mr-2"></i>
        Back to Services
    </a>
</div>
@endsection

@section('content')
<form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Service Information</h3>
                
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Service Name <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $service->name) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('name') border-red-500 @enderror">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('description') border-red-500 @enderror">{{ old('description', $service->description) }}</textarea>
                    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Price (MWK)</label>
                        <input type="number" step="1" id="price" name="price" value="{{ old('price', $service->price) }}" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('price') border-red-500 @enderror">
                        <p class="text-xs text-gray-500 mt-1">Leave empty for variable pricing.</p>
                        @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="category_id" name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('category_id') border-red-500 @enderror">
                            <option value="">Select Category</option>
                        </select>
                        @error('category_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                     <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700">FontAwesome Icon Class</label>
                        <input type="text" id="icon" name="icon" value="{{ old('icon', $service->icon) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('icon') border-red-500 @enderror">
                        <p class="text-xs text-gray-500 mt-1">e.g., 'fas fa-cogs'.</p>
                        @error('icon') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Service Image</h3>
                <div class="text-center">
                    <img id="image-preview" src="{{ $service->image ? asset($service->image) : asset('assets/img/placeholder.jpg') }}" alt="Image preview" class="w-full h-48 object-cover rounded-lg mb-4">
                    <input type="file" id="image" name="image" accept="image/*" class="hidden @error('image') border-red-500 @enderror" onchange="previewImage(event)">
                    <label for="image" class="cursor-pointer bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        <i class="fas fa-upload mr-2"></i> Change Image
                    </label>
                    <p class="text-xs text-gray-500 mt-2">Optional. Max file size: 2MB.</p>
                    @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Settings</h3>

                <div class="flex items-center justify-between">
                    <label for="is_active" class="text-sm font-medium text-gray-700">Active</label>
                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                        <label for="is_active" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-4">
                    <label for="featured" class="text-sm font-medium text-gray-700">Featured</label>
                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                        <input type="checkbox" name="featured" id="featured" value="1" {{ old('featured', $service->featured) ? 'checked' : '' }} class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                        <label for="featured" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 mb-2">
                    <i class="fas fa-save mr-2"></i> Update Service
                </button>
                <a href="{{ route('admin.services.index') }}" class="w-full text-center block bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300">
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
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('image-preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endpush
@endsection
