<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Analytics</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded bg-gray-700">Dashboard</a>
                <a href="{{ route('admin.entrepreneurs.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Entrepreneurs</a>
                <a href="{{ route('admin.digital-skills.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Digital Skills</a>
                <a href="{{ route('admin.services.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Services</a>
                <!-- Team and Workspace links are commented out as their routes don't exist yet -->
                <!-- <a href="{{-- route('admin.team-members.index') --}}" class="block py-2 px-4 rounded hover:bg-gray-700">Team</a> -->
                <!-- <a href="{{-- route('admin.workspace-bookings.index') --}}" class="block py-2 px-4 rounded hover:bg-gray-700">Workspace</a> -->
                <a href="{{ route('admin.users.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Users</a>
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
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Analytics Dashboard</h2>
                <p class="text-gray-600">Key metrics and insights for your platform</p>
            </div>

            <!-- User Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Users -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Users</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $totalUsers }}</p>
                            <p class="text-xs text-gray-500">
                                <span class="{{ $userGrowthRate >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $userGrowthRate >= 0 ? '↑' : '↓' }} {{ abs($userGrowthRate) }}% from last month
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- New Users This Month -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-2 bg-green-100 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">New Users (This Month)</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $newUsersThisMonth }}</p>
                        </div>
                    </div>
                </div>

                <!-- Total Entrepreneurs -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Entrepreneurs</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $totalEntrepreneurs }}</p>
                            <p class="text-xs text-gray-500">
                                {{ $pendingEntrepreneurs }} pending approval
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Total Services -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-2 bg-indigo-100 rounded-lg">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Services</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $totalServices }}</p>
                            <p class="text-xs text-gray-500">
                                {{ $activeServices }} active services
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- User Growth Chart -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">User Growth (Last 6 Months)</h3>
                    <div class="relative" style="height: 250px">
                        <canvas id="userGrowthChart"></canvas>
                    </div>
                </div>
                
                <!-- Entrepreneur Growth Chart -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Entrepreneur Growth (Last 6 Months)</h3>
                    <div class="relative" style="height: 250px">
                        <canvas id="entrepreneurGrowthChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Entrepreneurs -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Recent Entrepreneurs</h3>
                        <a href="{{ route('admin.entrepreneurs.index') }}" class="text-sm text-blue-600 hover:underline">View All</a>
                    </div>
                    <div class="space-y-3">
                        @forelse($recentEntrepreneurs as $entrepreneur)
                        <div class="flex justify-between items-center py-2 border-b">
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-semibold">
                                    {{ strtoupper(substr($entrepreneur->name ?? 'E', 0, 1)) }}
                                </div>
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900">{{ $entrepreneur->name ?? 'New Entrepreneur' }}</p>
                                    <p class="text-sm text-gray-500">{{ $entrepreneur->business_name ?? 'No business name' }}</p>
                                </div>
                            </div>
                            <span class="px-2 py-1 text-xs rounded-full 
                                @if($entrepreneur->status === 'pending') bg-yellow-100 text-yellow-800
                                @elseif($entrepreneur->status === 'approved') bg-green-100 text-green-800
                                @else bg-red-100 text-red-800 @endif">
                                {{ ucfirst($entrepreneur->status) }}
                            </span>
                        </div>
                        @empty
                        <p class="text-gray-500 text-center py-4">No recent entrepreneurs found</p>
                        @endforelse
                    </div>
                </div>

                <!-- Upcoming Workspace Bookings -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Upcoming Workspace Bookings</h3>
                        <a href="{{ route('admin.workspace-bookings.index') }}" class="text-sm text-blue-600 hover:underline">View All</a>
                    </div>
                    <div class="space-y-3">
                        @forelse($upcomingBookings as $booking)
                        <div class="flex justify-between items-center py-2 border-b">
                            <div>
                                <p class="font-medium text-gray-900">{{ $booking->user->name ?? 'Guest' }}</p>
                                <p class="text-sm text-gray-600">
                                    {{ \Carbon\Carbon::parse($booking->start_date)->format('M d, Y') }}
                                    @if($booking->end_date)
                                        - {{ \Carbon\Carbon::parse($booking->end_date)->format('M d, Y') }}
                                    @endif
                                </p>
                            </div>
                            <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full">
                                {{ $booking->status }}
                            </span>
                        </div>
                        @empty
                        <p class="text-gray-500 text-center py-4">No upcoming bookings</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // User Growth Chart
        const userCtx = document.getElementById('userGrowthChart').getContext('2d');
        new Chart(userCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($userGrowthChart['labels'] ?? []) !!},
                datasets: [{
                    label: 'New Users',
                    data: {!! json_encode($userGrowthChart['data'] ?? []) !!},
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

        // Entrepreneur Growth Chart
        const entrepreneurCtx = document.getElementById('entrepreneurGrowthChart').getContext('2d');
        new Chart(entrepreneurCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($entrepreneurGrowthChart['labels'] ?? []) !!},
                datasets: [{
                    label: 'New Entrepreneurs',
                    data: {!! json_encode($entrepreneurGrowthChart['data'] ?? []) !!},
                    backgroundColor: 'rgba(124, 58, 237, 0.7)',
                    borderColor: 'rgb(124, 58, 237)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>