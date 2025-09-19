<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrepreneurs Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 min-h-screen p-4">
            <div class="mb-8">
                <h1 class="text-xl font-bold">Admin Dashboard</h1>
                <p class="text-gray-400">{{ auth()->user()->name }}</p>
            </div>
            
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Dashboard</a>
                <a href="{{ route('admin.products.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Products</a>
                <a href="{{ route('admin.orders.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Orders</a>
                <a href="{{ route('admin.entrepreneurs.index') }}" class="block py-2 px-4 rounded bg-gray-700">Entrepreneurs</a>
                <a href="{{ route('admin.digital-skills.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Digital Skills</a>
                <a href="{{ route('admin.services.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Services</a>
                <a href="{{ route('admin.team-members.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Team</a>
                <a href="{{ route('admin.workspace-bookings.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Workspace</a>
                <a href="{{ route('admin.users.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Users</a>
            </nav>
        </div>
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Edit Training Program</h1>
        <a href="{{ route('admin.digital-skills.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Programs
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('admin.digital-skills.update', $digitalSkill->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">Program Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Program Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title', $digitalSkill->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Short Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                              id="short_description" name="short_description" rows="2" required>{{ old('short_description', $digitalSkill->short_description) }}</textarea>
                                    <div class="form-text">A brief summary of the program (max 200 characters).</div>
                                    @error('short_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Full Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror rich-text-editor" 
                                              id="description" name="description" rows="5">{{ old('description', $digitalSkill->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="level" class="form-label">Skill Level <span class="text-danger">*</span></label>
                                            <select class="form-select @error('level') is-invalid @enderror" 
                                                    id="level" name="level" required>
                                                <option value="" disabled>Select level</option>
                                                <option value="beginner" {{ (old('level', $digitalSkill->level) == 'beginner') ? 'selected' : '' }}>Beginner</option>
                                                <option value="intermediate" {{ (old('level', $digitalSkill->level) == 'intermediate') ? 'selected' : '' }}>Intermediate</option>
                                                <option value="advanced" {{ (old('level', $digitalSkill->level) == 'advanced') ? 'selected' : '' }}>Advanced</option>
                                            </select>
                                            @error('level')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="duration_hours" class="form-label">Duration (hours) <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('duration_hours') is-invalid @enderror" 
                                                   id="duration_hours" name="duration_hours" 
                                                   value="{{ old('duration_hours', $digitalSkill->duration_hours) }}" min="1" required>
                                            @error('duration_hours')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Price ($)</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" 
                                                       id="price" name="price" value="{{ old('price', $digitalSkill->price) }}" min="0">
                                            </div>
                                            <div class="form-text">Leave empty for free programs.</div>
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="max_participants" class="form-label">Max Participants</label>
                                            <input type="number" class="form-control @error('max_participants') is-invalid @enderror" 
                                                   id="max_participants" name="max_participants" 
                                                   value="{{ old('max_participants', $digitalSkill->max_participants) }}" min="1">
                                            <div class="form-text">Leave empty for unlimited participants.</div>
                                            @error('max_participants')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="start_date" class="form-label">Start Date</label>
                                            <input type="date" class="form-control @error('start_date') is-invalid @enderror" 
                                                   id="start_date" name="start_date" value="{{ old('start_date', optional($digitalSkill->start_date)->format('Y-m-d')) }}">
                                            @error('start_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="end_date" class="form-label">End Date</label>
                                            <input type="date" class="form-control @error('end_date') is-invalid @enderror" 
                                                   id="end_date" name="end_date" value="{{ old('end_date', optional($digitalSkill->end_date)->format('Y-m-d')) }}">
                                            @error('end_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Prerequisites</label>
                                    <div id="prerequisites-container">
                                        @php
                                            $prerequisites = old('prerequisites', $digitalSkill->prerequisites ?? []);
                                            $prerequisites = is_array($prerequisites) ? $prerequisites : json_decode($prerequisites, true) ?? [];
                                        @endphp
                                        @if(count($prerequisites) > 0)
                                            @foreach($prerequisites as $prerequisite)
                                                <div class="input-group mb-2">
                                                    <input type="text" class="form-control" name="prerequisites[]" 
                                                           value="{{ $prerequisite }}" required>
                                                    <button type="button" class="btn btn-outline-danger remove-field">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-secondary mt-2" id="add-prerequisite">
                                        <i class="fas fa-plus me-1"></i> Add Prerequisite
                                    </button>
                                    @error('prerequisites')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Learning Outcomes</label>
                                    <div id="learning-outcomes-container">
                                        @php
                                            $outcomes = old('learning_outcomes', $digitalSkill->learning_outcomes ?? []);
                                            if (is_string($outcomes)) {
                                                $outcomes = json_decode($outcomes, true) ?? [];
                                            }
                                        @endphp
                                        @if(count($outcomes) > 0)
                                            @foreach($outcomes as $outcome)
                                                <div class="input-group mb-2">
                                                    <input type="text" class="form-control" name="learning_outcomes[]" value="{{ $outcome }}">
                                                    <button type="button" class="btn btn-outline-danger remove-field">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="add-learning-outcome">
                                        <i class="fas fa-plus me-1"></i> Add Learning Outcome
                                    </button>
                                    @error('learning_outcomes')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Key Features</label>
                                    <div id="features-container">
                                        @php
                                            $features = old('features', $digitalSkill->features ?? []);
                                            if (is_string($features)) {
                                                $features = json_decode($features, true) ?? [];
                                            }
                                        @endphp
                                        @if(count($features) > 0)
                                            @foreach($features as $feature)
                                                <div class="input-group mb-2">
                                                    <input type="text" class="form-control" name="features[]" value="{{ $feature }}">
                                                    <button type="button" class="btn btn-outline-danger remove-field">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="add-feature">
                                        <i class="fas fa-plus me-1"></i> Add Feature
                                    </button>
                                    @error('features')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">Program Image</h5>
                            </div>
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <div class="image-preview mb-3" style="max-width: 100%;">
                                        <img id="image-preview" 
                                             src="{{ $digitalSkill->image ? asset($digitalSkill->image) : asset('assets/img/placeholder.jpg') }}" 
                                             class="img-fluid rounded" alt="Program preview" 
                                             style="max-height: 200px; object-fit: cover;">
                                    </div>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                           id="image" name="image" accept="image/*">
                                    <div class="form-text">Recommended size: 800x500px. Max file size: 2MB.</div>
                                    @error('image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">Program Settings</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" 
                                               id="is_active" name="is_active" value="1" 
                                               {{ old('is_active', $digitalSkill->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">Active</label>
                                    </div>

                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" 
                                               id="featured" name="featured" value="1"
                                               {{ old('featured', $digitalSkill->featured) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="featured">Featured Program</label>
                                        <div class="form-text">Featured programs appear on the homepage.</div>
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Update Program
                                    </button>
                                    <a href="{{ route('admin.digital-skills.index') }}" class="btn btn-outline-secondary mt-2">
                                        <i class="fas fa-times me-1"></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
