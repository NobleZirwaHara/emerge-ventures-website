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

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="mb-3">{{ $digitalSkill->title }}</h4>
                    <p class="text-muted">{{ $digitalSkill->short_description }}</p>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-tag me-2 text-primary"></i>
                                <div>
                                    <h6 class="mb-0 text-muted">Level</h6>
                                    @php
                                        $levelClasses = [
                                            'beginner' => 'bg-primary',
                                            'intermediate' => 'bg-info',
                                            'advanced' => 'bg-warning'
                                        ];
                                    @endphp
                                    <span class="badge {{ $levelClasses[$digitalSkill->level] ?? 'bg-secondary' }}">
                                        {{ ucfirst($digitalSkill->level) }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-clock me-2 text-primary"></i>
                                <div>
                                    <h6 class="mb-0 text-muted">Duration</h6>
                                    <p class="mb-0">{{ $digitalSkill->duration_hours }} hours</p>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calendar-alt me-2 text-primary"></i>
                                <div>
                                    <h6 class="mb-0 text-muted">Schedule</h6>
                                    <p class="mb-0">
                                        @if($digitalSkill->start_date && $digitalSkill->end_date)
                                            {{ $digitalSkill->start_date->format('M d, Y') }} - {{ $digitalSkill->end_date->format('M d, Y') }}
                                        @else
                                            Flexible schedule
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-tag me-2 text-primary"></i>
                                <div>
                                    <h6 class="mb-0 text-muted">Price</h6>
                                    <p class="mb-0">{{ $digitalSkill->price ? '$' . number_format($digitalSkill->price, 2) : 'Free' }}</p>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-users me-2 text-primary"></i>
                                <div>
                                    <h6 class="mb-0 text-muted">Max Participants</h6>
                                    <p class="mb-0">{{ $digitalSkill->max_participants ?? 'Unlimited' }}</p>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center">
                                <i class="fas fa-info-circle me-2 text-primary"></i>
                                <div>
                                    <h6 class="mb-0 text-muted">Status</h6>
                                    <div class="d-flex align-items-center">
                                        <span class="badge {{ $digitalSkill->is_active ? 'bg-success' : 'bg-secondary' }} me-2">
                                            {{ $digitalSkill->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                        @if($digitalSkill->featured)
                                            <span class="badge bg-primary">Featured</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h5>Program Description</h5>
                        <div class="border rounded p-3 bg-light">
                            {!! $digitalSkill->description !!}
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Prerequisites</h6>
                                </div>
                                <div class="card-body">
                                    @php
                                        $prerequisites = is_array($digitalSkill->prerequisites) 
                                            ? $digitalSkill->prerequisites 
                                            : (is_string($digitalSkill->prerequisites) 
                                                ? json_decode($digitalSkill->prerequisites, true) 
                                                : []);
                                    @endphp
                                    
                                    @if(!empty($prerequisites))
                                        <ul class="mb-0">
                                            @foreach($prerequisites as $prerequisite)
                                                <li>{{ $prerequisite }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-muted mb-0">No prerequisites required.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Learning Outcomes</h6>
                                </div>
                                <div class="card-body">
                                    @php
                                        $outcomes = is_array($digitalSkill->learning_outcomes) 
                                            ? $digitalSkill->learning_outcomes 
                                            : (is_string($digitalSkill->learning_outcomes) 
                                                ? json_decode($digitalSkill->learning_outcomes, true) 
                                                : []);
                                    @endphp
                                    
                                    @if(!empty($outcomes))
                                        <ul class="mb-0">
                                            @foreach($outcomes as $outcome)
                                                <li>{{ $outcome }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-muted mb-0">No learning outcomes defined.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Key Features</h6>
                                </div>
                                <div class="card-body">
                                    <h5 class="mt-4 mb-3">Key Features</h5>
                                    <ul class="list-unstyled">
                                        @if(!empty($digitalSkill->features))
                                            @foreach(json_decode($digitalSkill->features, true) as $feature)
                                                <li class="mb-2">
                                                    <i class="fas fa-star text-warning me-2"></i>
                                                    {{ $feature }}
                                                </li>
                                            @endforeach
                                        @else
                                            <li class="text-muted">No features specified.</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    @if($digitalSkill->image)
                        <div class="card mb-4">
                            <img src="{{ asset($digitalSkill->image) }}" class="card-img-top" alt="{{ $digitalSkill->title }}">
                        </div>
                    @endif
                    
                    <div class="card">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Program Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <h6 class="text-muted small mb-1">Created</h6>
                                <p class="mb-0">{{ $digitalSkill->created_at->format('M d, Y') }}</p>
                            </div>
                            
                            <div class="mb-3">
                                <h6 class="text-muted small mb-1">Last Updated</h6>
                                <p class="mb-0">{{ $digitalSkill->updated_at->format('M d, Y') }}</p>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <a href="{{ route('admin.digital-skills.edit', $digitalSkill->id) }}" 
                                   class="btn btn-primary">
                                    <i class="fas fa-edit me-1"></i> Edit Program
                                </a>
                                
                                <form action="{{ route('admin.digital-skills.destroy', $digitalSkill->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this program? This action cannot be undone.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger w-100">
                                        <i class="fas fa-trash me-1"></i> Delete Program
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
