@extends('layouts.admin')

@section('title', 'Create Service')

@section('header')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Create Service</h2>
        <p class="text-gray-600">Add a new service to your offerings</p>
    </div>
    <a href="{{ route('admin.services.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
        Back to Services
    </a>
</div>
@endsection

@section('content')
<div class="p-6">
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Service Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required 
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" 
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="auto-generated-if-blank">
                </div>

                <div class="md:col-span-2">
                    <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">Short Description</label>
                    <input type="text" name="short_description" id="short_description" value="{{ old('short_description') }}" 
                           class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="text-xs text-gray-500 mt-1">A brief summary of the service (max 255 characters).</p>
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="4" 
                              class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-100 text-gray-500">
                            <i id="icon-preview" class="{{ old('icon', 'msi msi-shopping-cart') }}"></i>
                        </span>
                        <input type="text" name="icon" id="icon" value="{{ old('icon', 'msi msi-shopping-cart') }}" 
                               class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="msi msi-icon-name">
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Use Material Design Icons (e.g., msi-shopping-cart)</p>
                </div>

                <div>
                    <label for="delivery_time_days" class="block text-sm font-medium text-gray-700 mb-2">Delivery Time (Days)</label>
                    <input type="number" name="delivery_time_days" id="delivery_time_days" value="{{ old('delivery_time_days') }}" 
                           min="0" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="text-xs text-gray-500 mt-1">Leave empty if not applicable</p>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Features</label>
                    <div id="features-container">
                        @if(old('features') && is_array(old('features')))
                            @foreach(old('features') as $index => $feature)
                                <div class="flex mb-2">
                                    <input type="text" name="features[]" value="{{ $feature }}" 
                                           class="flex-1 border border-gray-300 rounded-l-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <button type="button" class="px-3 py-2 bg-red-500 text-white rounded-r-md hover:bg-red-600 remove-feature">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            @endforeach
                        @else
                            <div class="flex mb-2">
                                <input type="text" name="features[]" 
                                       class="flex-1 border border-gray-300 rounded-l-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <button type="button" class="px-3 py-2 bg-red-500 text-white rounded-r-md hover:bg-red-600 remove-feature">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                    <button type="button" id="add-feature" class="mt-2 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-plus mr-1"></i> Add Feature
                    </button>
                </div>

                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Service Image</label>
                    <div class="mt-1 flex items-center">
                        <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                            <img id="image-preview" src="{{ old('image') ? asset('storage/' . old('image')) : asset('assets/img/placeholder.jpg') }}" alt="Preview" class="h-full w-full object-cover">
                        </span>
                        <label for="image-upload" class="ml-5">
                            <span class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Change
                            </span>
                            <input id="image-upload" name="image" type="file" class="sr-only" onchange="previewImage(this)">
                        </label>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Recommended size: 800x600px, Max size: 2MB</p>
                </div>
            </div>

            <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        <input type="hidden" name="is_active" value="0">
                        <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', true) ? 'checked' : '' }} 
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="is_active" class="ml-2 block text-sm text-gray-700">
                            Active
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input type="hidden" name="featured" value="0">
                        <input id="featured" name="featured" type="checkbox" value="1" {{ old('featured') ? 'checked' : '' }} 
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="featured" class="ml-2 block text-sm text-gray-700">
                            Featured
                        </label>
                    </div>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('admin.services.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save Service
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Auto-generate slug from name
    document.getElementById('name').addEventListener('input', function() {
        const slugInput = document.getElementById('slug');
        if (!slugInput.value) {
            const slug = this.value
                .toLowerCase()
                .replace(/[^\w\s-]/g, '') // remove non-word chars
                .replace(/\s+/g, '-')      // replace spaces with -
                .replace(/--+/g, '-');      // replace multiple - with single -
            slugInput.value = slug;
        }
    });

    // Update icon preview
    document.getElementById('icon').addEventListener('input', function() {
        document.getElementById('icon-preview').className = this.value;
    });

    // Image preview
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image-preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Add feature field
    document.getElementById('add-feature').addEventListener('click', function() {
        const container = document.getElementById('features-container');
        const div = document.createElement('div');
        div.className = 'flex mb-2';
        div.innerHTML = `
            <input type="text" name="features[]" 
                   class="flex-1 border border-gray-300 rounded-l-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="button" class="px-3 py-2 bg-red-500 text-white rounded-r-md hover:bg-red-600 remove-feature">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(div);
    });

    // Remove feature field
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-feature') || e.target.closest('.remove-feature')) {
            const button = e.target.classList.contains('remove-feature') ? e.target : e.target.closest('.remove-feature');
            if (document.querySelectorAll('#features-container > div').length > 1) {
                button.closest('.flex').remove();
            } else {
                button.previousElementSibling.value = '';
            }
        }
    });
</script>
@endpush

<style>
.toggle-checkbox:checked {
  right: 0;
  border-color: #4C808A;
}
.toggle-checkbox:checked + .toggle-label {
  background-color: #4C808A;
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

// Update icon preview
document.getElementById('icon').addEventListener('input', function() {
    const iconPreview = document.getElementById('icon-preview');
    const iconColor = document.getElementById('icon_color').value;
    iconPreview.className = this.value + ' ' + iconColor;
});

// Handle icon color selection
document.querySelectorAll('.icon-color-selector').forEach(selector => {
    selector.addEventListener('click', function() {
        const color = this.getAttribute('data-color');
        document.getElementById('icon_color').value = color;
        document.querySelectorAll('.icon-color-selector').forEach(el => {
            el.classList.remove('ring-2', 'ring-offset-2', 'ring-blue-500');
        });
        this.classList.add('ring-2', 'ring-offset-2', 'ring-blue-500');
        
        // Update icon preview with new color
        const icon = document.getElementById('icon').value;
        document.getElementById('icon-preview').className = icon + ' ' + color;
    });
});

// Add/remove feature fields
document.getElementById('add-feature').addEventListener('click', function() {
    const container = document.getElementById('features-container');
    const featureCount = container.getElementsByTagName('input').length;
    
    if (featureCount >= 10) {
        alert('Maximum 10 features allowed');
        return;
    }
    
    const div = document.createElement('div');
    div.className = 'flex mb-2';
    div.innerHTML = `
        <input type="text" name="features[]" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Feature description">
        <button type="button" class="ml-2 px-3 py-1 bg-red-100 text-red-600 rounded-md hover:bg-red-200 remove-feature">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(div);
});

// Remove feature field
document.addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('remove-feature')) {
        e.target.closest('.flex').remove();
    }
});
</script>
@endpush
@endsection
