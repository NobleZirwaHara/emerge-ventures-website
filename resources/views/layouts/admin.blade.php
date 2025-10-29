<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - {{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700 @if(request()->routeIs('admin.dashboard')) bg-gray-700 @endif">Dashboard</a>
                <a href="{{ route('admin.entrepreneurs.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700 @if(request()->routeIs('admin.entrepreneurs.*')) bg-gray-700 @endif">Entrepreneurs</a>
                <a href="{{ route('admin.digital-skills.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700 @if(request()->routeIs('admin.digital-skills.*')) bg-gray-700 @endif">Digital Skills</a>
                <a href="{{ route('admin.services.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700 @if(request()->routeIs('admin.services.*')) bg-gray-700 @endif">Services</a>
                <a href="{{ route('admin.users.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700 @if(request()->routeIs('admin.users.*')) bg-gray-700 @endif">Users</a>
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="w-full text-left block py-2 px-4 rounded hover:bg-gray-700 text-white">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            @yield('header')

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white rounded-lg shadow overflow-x-auto">
                @yield('content')
            </div>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
