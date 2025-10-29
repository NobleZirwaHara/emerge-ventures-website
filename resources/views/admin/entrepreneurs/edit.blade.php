<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit {{ $entrepreneur->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        :root { --primary-50: #f0f9ff; --primary-500: #3b82f6; --primary-600: #2563eb; --primary-700: #1d4ed8; }
        .form-input {
            display: block;
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.75rem;
            background-color: #fff;
            box-shadow: 0 1px 2px rgba(0,0,0,0.04);
            transition: box-shadow .2s, border-color .2s, transform .2s;
        }
        .form-input:hover { border-color: #d1d5db; }
        .form-input:focus {
            outline: none;
            border-color: var(--primary-500);
            box-shadow: 0 0 0 3px rgba(59,130,246,0.25);
        }
        .form-label { display:block; font-size: .875rem; font-weight: 600; color: #374151; margin-bottom: .5rem; }
        .form-section {
            background-color: #fff;
            border: 1px solid #f3f4f6;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 1px 2px rgba(0,0,0,0.04);
            transition: box-shadow .2s;
        }
        .form-section:hover { box-shadow: 0 8px 24px rgba(0,0,0,0.06); }
        .btn-primary {
            background: linear-gradient(to right, var(--primary-600), var(--primary-700));
            color: #fff;
            padding: 0.75rem 2rem;
            border-radius: 0.75rem;
            font-weight: 600;
            box-shadow: 0 10px 15px -3px rgba(37,99,235,0.25);
            transition: transform .2s, box-shadow .2s;
            border: 0;
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 20px 25px -5px rgba(37,99,235,0.3); }
        .btn-secondary {
            background-color: #f3f4f6;
            color: #374151;
            padding: 0.75rem 2rem;
            border-radius: 0.75rem;
            font-weight: 600;
            border: 0;
            transition: background-color .2s;
        }
        .btn-secondary:hover { background-color: #e5e7eb; }
        .tag-input {
            display:flex; flex-wrap:wrap; gap:.5rem; padding:.75rem; border:1px solid #e5e7eb; border-radius:.75rem; min-height:3rem;
        }
        .tag-input:focus-within { box-shadow: 0 0 0 3px rgba(59,130,246,0.25); border-color: var(--primary-500); }
        .tag {
            background-color: #dbeafe; color: #1e40af; padding:.25rem .75rem; border-radius:.5rem; font-size:.875rem; font-weight:500; display:inline-flex; align-items:center; gap:.5rem;
        }
        .current-image { position: relative; overflow: hidden; border-radius: .75rem; }
        .current-image img { transition: transform .2s; }
        .current-image:hover img { transform: scale(1.05); }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
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
        <div class="flex-1 p-8 max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent mb-2">
                            Edit {{ $entrepreneur->name }}
                        </h1>
                        <p class="text-gray-600 text-lg">Update entrepreneur profile information</p>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('admin.entrepreneurs.show', $entrepreneur) }}" class="btn-secondary">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            View Profile
                        </a>
                        <a href="{{ route('admin.entrepreneurs.index') }}" class="btn-secondary">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Back to List
                        </a>
                    </div>
                </div>
            </div>

            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 p-6 rounded-xl mb-8">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Please fix the following errors:</h3>
                            <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('admin.entrepreneurs.update', $entrepreneur) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')
                
                <!-- Personal Information -->
                <div class="form-section">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-primary-500 to-primary-600 p-3 rounded-xl mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Personal Information</h3>
                            <p class="text-gray-600">Basic personal details and contact information</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="form-label">Full Name *</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $entrepreneur->name) }}" required
                                class="form-input" placeholder="Enter full name">
                        </div>
                        <div>
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $entrepreneur->email) }}" required
                                class="form-input" placeholder="Enter email address">
                        </div>
                        <div>
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone', $entrepreneur->phone) }}"
                                class="form-input" placeholder="Enter phone number">
                        </div>
                        <div>
                            <label for="location" class="form-label">Location *</label>
                            <input type="text" name="location" id="location" value="{{ old('location', $entrepreneur->location) }}" required
                                class="form-input" placeholder="City, Country">
                        </div>
                        <div>
                            <label for="role" class="form-label">Role/Position</label>
                            <input type="text" name="role" id="role" value="{{ old('role', $entrepreneur->role) }}" 
                                class="form-input" placeholder="e.g., Founder, CEO, Director">
                        </div>
                        <div>
                            <label for="profile_image" class="form-label">Profile Image</label>
                            @if($entrepreneur->profile_image)
                                <div class="current-image mb-3 inline-block">
                                    <img src="{{ asset('' . $entrepreneur->profile_image) }}" alt="Current profile" class="h-20 w-20 rounded-full object-cover border-4 border-white shadow-lg">
                                    <p class="text-xs text-gray-500 mt-1 text-center">Current image</p>
                                </div>
                            @endif
                            <div class="relative">
                                <input type="file" name="profile_image" id="profile_image" accept="image/*"
                                    class="form-input file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                                <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF up to 2MB</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <label for="bio" class="form-label">Personal Bio</label>
                        <textarea name="bio" id="bio" rows="4" 
                            class="form-input resize-none" placeholder="Brief personal biography and background">{{ old('bio', $entrepreneur->bio) }}</textarea>
                    </div>
                </div>

                <!-- Business Information -->
                <div class="form-section">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-green-500 to-green-600 p-3 rounded-xl mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Business Information</h3>
                            <p class="text-gray-600">Company details and business overview</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <label for="business_name" class="form-label">Business Name *</label>
                            <input type="text" name="business_name" id="business_name" value="{{ old('business_name', $entrepreneur->business_name) }}" required
                                class="form-input" placeholder="Enter business name">
                        </div>
                        <div>
                            <label for="industry" class="form-label">Industry *</label>
                            <input type="text" name="industry" id="industry" value="{{ old('industry', $entrepreneur->industry) }}" required
                                class="form-input" placeholder="e.g., Technology, Healthcare, Finance">
                        </div>
                        <div>
                            <label for="founded_year" class="form-label">Founded Year</label>
                            <input type="number" name="founded_year" id="founded_year" value="{{ old('founded_year', $entrepreneur->founded_year) }}" 
                                min="1900" max="{{ date('Y') }}" class="form-input" placeholder="{{ date('Y') }}">
                        </div>
                        <div>
                            <label for="business_size" class="form-label">Business Size</label>
                            <select name="business_size" id="business_size" class="form-input">
                                <option value="">Select business size</option>
                                <option value="Solo entrepreneur" {{ old('business_size', $entrepreneur->business_size) == 'Solo entrepreneur' ? 'selected' : '' }}>Solo entrepreneur</option>
                                <option value="2-5 employees" {{ old('business_size', $entrepreneur->business_size) == '2-5 employees' ? 'selected' : '' }}>2-5 employees</option>
                                <option value="6-10 employees" {{ old('business_size', $entrepreneur->business_size) == '6-10 employees' ? 'selected' : '' }}>6-10 employees</option>
                                <option value="11-25 employees" {{ old('business_size', $entrepreneur->business_size) == '11-25 employees' ? 'selected' : '' }}>11-25 employees</option>
                                <option value="26-50 employees" {{ old('business_size', $entrepreneur->business_size) == '26-50 employees' ? 'selected' : '' }}>26-50 employees</option>
                                <option value="50+ employees" {{ old('business_size', $entrepreneur->business_size) == '50+ employees' ? 'selected' : '' }}>50+ employees</option>
                            </select>
                        </div>
                        <div>
                            <label for="website" class="form-label">Website URL</label>
                            <input type="url" name="website" id="website" value="{{ old('website', $entrepreneur->website) }}" 
                                class="form-input" placeholder="https://www.example.com">
                        </div>
                        <div>
                            <label for="business_logo" class="form-label">Business Logo</label>
                            @if($entrepreneur->business_logo)
                                <div class="current-image mb-3 inline-block">
                                    <img src="{{ asset('' . $entrepreneur->business_logo) }}" alt="Current logo" class="h-20 w-20 rounded-xl object-cover border-4 border-white shadow-lg">
                                    <p class="text-xs text-gray-500 mt-1 text-center">Current logo</p>
                                </div>
                            @endif
                            <div class="relative">
                                <input type="file" name="business_logo" id="business_logo" accept="image/*"
                                    class="form-input file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                                <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF up to 2MB</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label for="business_description" class="form-label">Business Description *</label>
                            <textarea name="business_description" id="business_description" rows="4" required
                                class="form-input resize-none" placeholder="Describe what your business does">{{ old('business_description', $entrepreneur->business_description) }}</textarea>
                        </div>
                        <div>
                            <label for="business_preview" class="form-label">Business Preview</label>
                            <textarea name="business_preview" id="business_preview" rows="4" 
                                class="form-input resize-none" placeholder="Short preview for business cards (optional)">{{ old('business_preview', $entrepreneur->business_preview) }}</textarea>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="overview" class="form-label">Detailed Overview</label>
                        <textarea name="overview" id="overview" rows="5" 
                            class="form-input resize-none" placeholder="Comprehensive overview for the profile page">{{ old('overview', $entrepreneur->overview) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label for="value_proposition" class="form-label">Value Proposition</label>
                            <textarea name="value_proposition" id="value_proposition" rows="3"
                                class="form-input resize-none" placeholder="What unique value does your business provide?">{{ old('value_proposition', $entrepreneur->value_proposition) }}</textarea>
                        </div>
                        <div>
                            <label for="five_year_plan" class="form-label">5 Year Strategic Plan</label>
                            <textarea name="five_year_plan" id="five_year_plan" rows="3"
                                class="form-input resize-none" placeholder="Where do you see your business in 5 years?">{{ old('five_year_plan', $entrepreneur->five_year_plan) }}</textarea>
                        </div>
                    </div>
                </div>

       
         <!-- Skills & Expertise -->
                <div class="form-section">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-3 rounded-xl mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Skills & Expertise</h3>
                            <p class="text-gray-600">Professional skills and key achievements</p>
                        </div>
                    </div>
                    
                    <div class="space-y-6">
                        <div>
                            <label for="skills_input" class="form-label">Skills & Competencies</label>
                            <div id="skills_container" class="tag-input">
                                <input type="text" id="skills_input" placeholder="Type a skill and press Enter" 
                                    class="flex-1 border-0 outline-none bg-transparent min-w-[200px]">
                            </div>
                            <input type="hidden" name="skills" id="skills_hidden" value="{{ json_encode($entrepreneur->skills ?? []) }}">
                            <p class="text-xs text-gray-500 mt-1">Press Enter to add skills</p>
                        </div>

                        <div>
                            <label for="achievements_input" class="form-label">Key Achievements</label>
                            <div id="achievements_container" class="tag-input">
                                <input type="text" id="achievements_input" placeholder="Type an achievement and press Enter" 
                                    class="flex-1 border-0 outline-none bg-transparent min-w-[200px]">
                            </div>
                            <input type="hidden" name="achievements" id="achievements_hidden" value="{{ json_encode($entrepreneur->achievements ?? []) }}">
                            <p class="text-xs text-gray-500 mt-1">Press Enter to add achievements</p>
                        </div>

                        <div>
                            <label for="partners_input" class="form-label">Business Partners</label>
                            <div id="partners_container" class="tag-input">
                                <input type="text" id="partners_input" placeholder="Type a partner name and press Enter" 
                                    class="flex-1 border-0 outline-none bg-transparent min-w-[200px]">
                            </div>
                            <input type="hidden" name="partners" id="partners_hidden" value="{{ json_encode($entrepreneur->partners ?? []) }}">
                            <p class="text-xs text-gray-500 mt-1">Press Enter to add business partners</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="form-section">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-3 rounded-xl mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Contact & Location</h3>
                            <p class="text-gray-600">Business contact details and location information</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <label for="business_address" class="form-label">Business Address</label>
                            <input type="text" name="business_address" id="business_address" value="{{ old('business_address', $entrepreneur->business_address) }}"
                                class="form-input" placeholder="Full business address">
                        </div>
                        <div>
                            <label for="business_phone" class="form-label">Business Phone</label>
                            <input type="text" name="business_phone" id="business_phone" value="{{ old('business_phone', $entrepreneur->business_phone) }}"
                                class="form-input" placeholder="Business phone number">
                        </div>
                        <div>
                            <label for="business_email" class="form-label">Business Email</label>
                            <input type="email" name="business_email" id="business_email" value="{{ old('business_email', $entrepreneur->business_email) }}"
                                class="form-input" placeholder="Business email address">
                        </div>
                        <div>
                            <label for="business_hours" class="form-label">Business Hours</label>
                            <textarea name="business_hours" id="business_hours" rows="2" 
                                class="form-input resize-none" placeholder="e.g., Mon-Fri: 9AM-5PM&#10;Sat: 9AM-1PM">{{ old('business_hours', $entrepreneur->business_hours) }}</textarea>
                        </div>
                        <div>
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="number" name="latitude" id="latitude" value="{{ old('latitude', $entrepreneur->latitude) }}" 
                                step="0.00000001" min="-90" max="90" class="form-input" placeholder="e.g., -13.9626">
                        </div>
                        <div>
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="number" name="longitude" id="longitude" value="{{ old('longitude', $entrepreneur->longitude) }}" 
                                step="0.00000001" min="-180" max="180" class="form-input" placeholder="e.g., 33.7741">
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="form-section">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-pink-500 to-pink-600 p-3 rounded-xl mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M7 4h10"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Social Media & Online Presence</h3>
                            <p class="text-gray-600">Social media profiles and online presence</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <label for="facebook" class="form-label">Facebook</label>
                            <input type="url" name="social_media[facebook]" id="facebook" value="{{ old('social_media.facebook', $entrepreneur->social_media['facebook'] ?? '') }}"
                                class="form-input" placeholder="https://facebook.com/yourpage">
                        </div>
                        <div>
                            <label for="twitter" class="form-label">Twitter</label>
                            <input type="url" name="social_media[twitter]" id="twitter" value="{{ old('social_media.twitter', $entrepreneur->social_media['twitter'] ?? '') }}"
                                class="form-input" placeholder="https://twitter.com/youraccount">
                        </div>
                        <div>
                            <label for="linkedin" class="form-label">LinkedIn</label>
                            <input type="url" name="social_media[linkedin]" id="linkedin" value="{{ old('social_media.linkedin', $entrepreneur->social_media['linkedin'] ?? '') }}"
                                class="form-input" placeholder="https://linkedin.com/in/yourprofile">
                        </div>
                        <div>
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="url" name="social_media[instagram]" id="instagram" value="{{ old('social_media.instagram', $entrepreneur->social_media['instagram'] ?? '') }}"
                                class="form-input" placeholder="https://instagram.com/youraccount">
                        </div>
                    </div>
                </div>

                <!-- Administrative Settings -->
                <div class="form-section">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-gray-500 to-gray-600 p-3 rounded-xl mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Administrative Settings</h3>
                            <p class="text-gray-600">Status and administrative configurations</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <label for="status" class="form-label">Application Status *</label>
                            <select name="status" id="status" required class="form-input">
                                <option value="pending" {{ old('status', $entrepreneur->status) == 'pending' ? 'selected' : '' }}>Pending Review</option>
                                <option value="approved" {{ old('status', $entrepreneur->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ old('status', $entrepreneur->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>
                        <div>
                            <label for="joined_date" class="form-label">Joined Date</label>
                            <input type="date" name="joined_date" id="joined_date" value="{{ old('joined_date', $entrepreneur->joined_date?->format('Y-m-d')) }}"
                                class="form-input">
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="flex items-center p-4 bg-gradient-to-r from-primary-50 to-primary-100 rounded-xl border border-primary-200 cursor-pointer hover:from-primary-100 hover:to-primary-200 transition-all duration-200">
                            <input type="checkbox" name="featured" value="1" {{ old('featured', $entrepreneur->featured) ? 'checked' : '' }}
                                class="w-5 h-5 text-primary-600 bg-white border-primary-300 rounded focus:ring-primary-500 focus:ring-2">
                            <div class="ml-3">
                                <span class="text-sm font-semibold text-primary-800">Featured Entrepreneur</span>
                                <p class="text-xs text-primary-600">Highlight this entrepreneur on the homepage and featured sections</p>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4 pt-6">
                    <a href="{{ route('admin.entrepreneurs.show', $entrepreneur) }}" class="btn-secondary">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Update Entrepreneur
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Tag input functionality
        function setupTagInput(inputId, containerId, hiddenId, initialData = []) {
            const input = document.getElementById(inputId);
            const container = document.getElementById(containerId);
            const hidden = document.getElementById(hiddenId);
            let tags = Array.isArray(initialData) ? initialData : [];

            function updateHidden() {
                hidden.value = JSON.stringify(tags);
            }

            function addTag(text) {
                if (text.trim() && !tags.includes(text.trim())) {
                    tags.push(text.trim());
                    renderTags();
                    updateHidden();
                }
                input.value = '';
            }

            function removeTag(index) {
                tags.splice(index, 1);
                renderTags();
                updateHidden();
            }

            function renderTags() {
                const existingTags = container.querySelectorAll('.tag');
                existingTags.forEach(tag => tag.remove());

                tags.forEach((tag, index) => {
                    const tagElement = document.createElement('span');
                    tagElement.className = 'tag';
                    tagElement.innerHTML = `
                        ${tag}
                        <button type="button" onclick="removeTag_${hiddenId}(${index})" class="ml-1 text-primary-600 hover:text-primary-800">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    `;
                    container.insertBefore(tagElement, input);
                });
            }

            input.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addTag(input.value);
                }
            });

            // Make remove function globally accessible
            window[`removeTag_${hiddenId}`] = removeTag;

            // Initial render
            renderTags();
            updateHidden();
        }

        // Initialize tag inputs with existing data
        document.addEventListener('DOMContentLoaded', function() {
            const skillsData = JSON.parse(document.getElementById('skills_hidden').value || '[]');
            const achievementsData = JSON.parse(document.getElementById('achievements_hidden').value || '[]');
            const partnersData = JSON.parse(document.getElementById('partners_hidden').value || '[]');

            setupTagInput('skills_input', 'skills_container', 'skills_hidden', skillsData);
            setupTagInput('achievements_input', 'achievements_container', 'achievements_hidden', achievementsData);
            setupTagInput('partners_input', 'partners_container', 'partners_hidden', partnersData);
        });
    </script>
</body>
</html>