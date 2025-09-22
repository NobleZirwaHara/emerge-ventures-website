@extends('layouts.admin')

@section('title', 'Add New Digital Skill')

@section('header')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Add New Training Program</h2>
        <p class="text-gray-600">Create a new digital skills training program</p>
    </div>
    <a href="{{ route('admin.digital-skills.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 flex items-center">
        <i class="fas fa-arrow-left mr-2"></i>
        Back to Programs
    </a>
</div>
@endsection

@section('content')
<form action="{{ route('admin.digital-skills.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
    @csrf
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Program Information</h3>
                
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Program Title <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('title') border-red-500 @enderror">
                    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label for="short_description" class="block text-sm font-medium text-gray-700">Short Description <span class="text-red-500">*</span></label>
                    <textarea id="short_description" name="short_description" rows="2" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('short_description') border-red-500 @enderror">{{ old('short_description') }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">A brief summary (max 200 characters).</p>
                    @error('short_description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Full Description <span class="text-red-500">*</span></label>
                    <textarea id="description" name="description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Program Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="level" class="block text-sm font-medium text-gray-700">Skill Level <span class="text-red-500">*</span></label>
                        <select id="level" name="level" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('level') border-red-500 @enderror">
                            <option value="" disabled selected>Select level</option>
                            <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                            <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                        </select>
                        @error('level') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="duration_hours" class="block text-sm font-medium text-gray-700">Duration (hours) <span class="text-red-500">*</span></label>
                        <input type="number" id="duration_hours" name="duration_hours" value="{{ old('duration_hours') }}" min="1" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('duration_hours') border-red-500 @enderror">
                        @error('duration_hours') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Price (MWK)</label>
                        <input type="number" step="1" id="price" name="price" value="{{ old('price') }}" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('price') border-red-500 @enderror">
                        <p class="text-xs text-gray-500 mt-1">Leave empty for free programs.</p>
                        @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="max_participants" class="block text-sm font-medium text-gray-700">Max Participants</label>
                        <input type="number" id="max_participants" name="max_participants" value="{{ old('max_participants') }}" min="1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('max_participants') border-red-500 @enderror">
                        <p class="text-xs text-gray-500 mt-1">Leave empty for unlimited.</p>
                        @error('max_participants') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('start_date') border-red-500 @enderror">
                        @error('start_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                        <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('end_date') border-red-500 @enderror">
                        @error('end_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Program Content</h3>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Prerequisites</label>
                    <div id="prerequisites-container" class="space-y-2"></div>
                    <button type="button" id="add-prerequisite" class="mt-2 text-sm text-blue-600 hover:text-blue-800"><i class="fas fa-plus mr-1"></i> Add Prerequisite</button>
                    @error('prerequisites') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Learning Outcomes</label>
                    <div id="learning-outcomes-container" class="space-y-2"></div>
                    <button type="button" id="add-learning-outcome" class="mt-2 text-sm text-blue-600 hover:text-blue-800"><i class="fas fa-plus mr-1"></i> Add Learning Outcome</button>
                    @error('learning_outcomes') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Key Features</label>
                    <div id="features-container" class="space-y-2"></div>
                    <button type="button" id="add-feature" class="mt-2 text-sm text-blue-600 hover:text-blue-800"><i class="fas fa-plus mr-1"></i> Add Feature</button>
                    @error('features') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Program Image</h3>
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Image URL</label>
                    <input type="text" id="image" name="image" value="{{ old('image') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('image') border-red-500 @enderror" placeholder="https://example.com/image.jpg">
                    @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="mt-4">
                    <img id="image-preview" src="{{ old('image', asset('assets/img/placeholder.jpg')) }}" alt="Image preview" class="w-full h-48 object-cover rounded-lg">
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Settings</h3>

                <div class="flex items-center justify-between mb-4">
                    <label for="is_active" class="text-sm font-medium text-gray-700">Active</label>
                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                        <label for="is_active" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label for="featured" class="text-sm font-medium text-gray-700">Featured Program</label>
                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                        <input type="checkbox" name="featured" id="featured" value="1" {{ old('featured') ? 'checked' : '' }} class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                        <label for="featured" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-1">Featured programs may appear on the homepage.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 mb-2">
                    <i class="fas fa-save mr-2"></i> Save Program
                </button>
                <button type="reset" class="w-full bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300">
                    <i class="fas fa-undo mr-2"></i> Reset Form
                </button>
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
    document.getElementById('image').addEventListener('input', function() {
        const preview = document.getElementById('image-preview');
        const placeholder = "{{ asset('assets/img/placeholder.jpg') }}";
        preview.src = this.value || placeholder;
        preview.onerror = () => { preview.src = placeholder; };
    });

    function createDynamicField(container, name, placeholder) {
        const wrapper = document.createElement('div');
        wrapper.className = 'flex items-center space-x-2';

        const input = document.createElement('input');
        input.type = 'text';
        input.name = `${name}[]`;
        input.className = 'flex-grow block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm';
        input.placeholder = placeholder;

        const removeBtn = document.createElement('button');
        removeBtn.type = 'button';
        removeBtn.className = 'text-red-500 hover:text-red-700';
        removeBtn.innerHTML = '<i class="fas fa-trash"></i>';
        removeBtn.onclick = () => wrapper.remove();

        wrapper.appendChild(input);
        wrapper.appendChild(removeBtn);
        container.appendChild(wrapper);
    }

    document.getElementById('add-prerequisite').addEventListener('click', () => {
        createDynamicField(document.getElementById('prerequisites-container'), 'prerequisites', 'e.g., Basic computer skills');
    });

    document.getElementById('add-learning-outcome').addEventListener('click', () => {
        createDynamicField(document.getElementById('learning-outcomes-container'), 'learning_outcomes', 'e.g., Create responsive websites');
    });

    document.getElementById('add-feature').addEventListener('click', () => {
        createDynamicField(document.getElementById('features-container'), 'features', 'e.g., Hands-on projects');
    });

</script>
@endpush
@endsection
