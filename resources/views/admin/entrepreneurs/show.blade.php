<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $entrepreneur->name }} - Entrepreneur Details</title>
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
                <a href="{{ route('admin.entrepreneurs.index') }}" class="block py-2 px-4 rounded bg-gray-700">Entrepreneurs</a>
                <a href="{{ route('admin.digital-skills.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Digital Skills</a>
                <a href="{{ route('admin.services.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Services</a>
                <a href="{{ route('admin.users.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Users</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">{{ $entrepreneur->name }}</h2>
                    <p class="text-gray-600">{{ $entrepreneur->business_name }} - {{ $entrepreneur->industry }}</p>
                </div>
                <div class="space-x-2">
                    <a href="{{ route('admin.entrepreneurs.edit', $entrepreneur) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Edit
                    </a>
                    <a href="{{ route('admin.entrepreneurs.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
                        Back to List
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Profile Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="text-center">
                            @if($entrepreneur->profile_image)
                                <img class="h-32 w-32 rounded-full mx-auto object-cover" src="{{ asset($entrepreneur->profile_image) }}" alt="{{ $entrepreneur->name }}">
                            @else
                                <div class="h-32 w-32 rounded-full bg-gray-300 flex items-center justify-center mx-auto">
                                    <span class="text-2xl font-medium text-gray-700">{{ substr($entrepreneur->name, 0, 2) }}</span>
                                </div>
                            @endif
                            <h3 class="mt-4 text-xl font-semibold text-gray-900">{{ $entrepreneur->name }}</h3>
                            <p class="text-gray-600">{{ $entrepreneur->role ?? 'Entrepreneur' }}</p>
                            
                            <!-- Status Update Form -->
                            <form action="{{ route('admin.entrepreneurs.updateStatus', $entrepreneur) }}" method="POST" class="mt-4">
                                @csrf
                                @method('PATCH')
                                <div class="flex flex-col space-y-3">
                                    <select name="status" class="border-gray-300 rounded-md">
                                        <option value="pending" {{ $entrepreneur->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="approved" {{ $entrepreneur->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="rejected" {{ $entrepreneur->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="featured" value="1" {{ $entrepreneur->featured ? 'checked' : '' }} class="mr-2">
                                        Featured Entrepreneur
                                    </label>
                                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                        Update Status
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="bg-white rounded-lg shadow p-6 mt-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h4>
                        <div class="space-y-3">
                            <div>
                                <label class="text-sm font-medium text-gray-500">Email</label>
                                <p class="text-gray-900">{{ $entrepreneur->email }}</p>
                            </div>
                            @if($entrepreneur->phone)
                            <div>
                                <label class="text-sm font-medium text-gray-500">Phone</label>
                                <p class="text-gray-900">{{ $entrepreneur->phone }}</p>
                            </div>
                            @endif
                            <div>
                                <label class="text-sm font-medium text-gray-500">Location</label>
                                <p class="text-gray-900">{{ $entrepreneur->location }}</p>
                            </div>
                            @if($entrepreneur->website)
                            <div>
                                <label class="text-sm font-medium text-gray-500">Website</label>
                                <a href="{{ $entrepreneur->website }}" target="_blank" class="text-blue-600 hover:text-blue-800">{{ $entrepreneur->website }}</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Business Details -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center mb-6">
                            @if($entrepreneur->business_logo)
                                <img class="h-16 w-16 rounded object-cover mr-4" src="{{ asset($entrepreneur->business_logo) }}" alt="{{ $entrepreneur->business_name }}">
                            @endif
                            <div>
                                <h3 class="text-2xl font-semibold text-gray-900">{{ $entrepreneur->business_name }}</h3>
                                <p class="text-gray-600">{{ $entrepreneur->industry }}</p>
                                @if($entrepreneur->founded_year)
                                    <p class="text-sm text-gray-500">Founded in {{ $entrepreneur->founded_year }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- Business Description -->
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Business Description</h4>
                            <p class="text-gray-700">{{ $entrepreneur->business_description }}</p>
                        </div>

                        @if($entrepreneur->overview)
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Overview</h4>
                            <p class="text-gray-700">{{ $entrepreneur->overview }}</p>
                        </div>
                        @endif

                        @if($entrepreneur->bio)
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Bio</h4>
                            <p class="text-gray-700">{{ $entrepreneur->bio }}</p>
                        </div>
                        @endif

                        <!-- Business Information Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            @if($entrepreneur->business_size)
                            <div>
                                <label class="text-sm font-medium text-gray-500">Business Size</label>
                                <p class="text-gray-900">{{ $entrepreneur->business_size }}</p>
                            </div>
                            @endif
                            @if($entrepreneur->business_address)
                            <div>
                                <label class="text-sm font-medium text-gray-500">Business Address</label>
                                <p class="text-gray-900">{{ $entrepreneur->business_address }}</p>
                            </div>
                            @endif
                            @if($entrepreneur->business_phone)
                            <div>
                                <label class="text-sm font-medium text-gray-500">Business Phone</label>
                                <p class="text-gray-900">{{ $entrepreneur->business_phone }}</p>
                            </div>
                            @endif
                            @if($entrepreneur->business_email)
                            <div>
                                <label class="text-sm font-medium text-gray-500">Business Email</label>
                                <p class="text-gray-900">{{ $entrepreneur->business_email }}</p>
                            </div>
                            @endif
                        </div>

                        @if($entrepreneur->skills)
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Skills</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($entrepreneur->skills as $skill)
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">{{ $skill }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if($entrepreneur->achievements)
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Achievements</h4>
                            <ul class="list-disc list-inside space-y-1">
                                @foreach($entrepreneur->achievements as $achievement)
                                    <li class="text-gray-700">{{ $achievement }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if($entrepreneur->value_proposition)
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Value Proposition</h4>
                            <p class="text-gray-700">{{ $entrepreneur->value_proposition }}</p>
                        </div>
                        @endif

                        @if($entrepreneur->five_year_plan)
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">5 Year Plan</h4>
                            <p class="text-gray-700">{{ $entrepreneur->five_year_plan }}</p>
                        </div>
                        @endif

                        @if($entrepreneur->milestones)
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Business Milestones</h4>
                            <div class="space-y-3">
                                @foreach($entrepreneur->milestones as $milestone)
                                    <div class="border-l-4 border-blue-500 pl-4">
                                        <p class="font-medium text-gray-900">{{ $milestone['description'] ?? $milestone }}</p>
                                        @if(isset($milestone['date']))
                                            <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($milestone['date'])->format('F Y') }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if($entrepreneur->partners)
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Business Partners</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($entrepreneur->partners as $partner)
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">{{ $partner }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if($entrepreneur->social_media)
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Social Media</h4>
                            <div class="flex flex-wrap gap-3">
                                @foreach($entrepreneur->social_media as $platform => $link)
                                    <a href="{{ $link }}" target="_blank" class="text-blue-600 hover:text-blue-800 capitalize">{{ $platform }}</a>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Timestamps -->
                        <div class="border-t pt-4 mt-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-500">
                                <div>
                                    <label class="font-medium">Created</label>
                                    <p>{{ $entrepreneur->created_at->format('M d, Y \a\t g:i A') }}</p>
                                </div>
                                <div>
                                    <label class="font-medium">Last Updated</label>
                                    <p>{{ $entrepreneur->updated_at->format('M d, Y \a\t g:i A') }}</p>
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