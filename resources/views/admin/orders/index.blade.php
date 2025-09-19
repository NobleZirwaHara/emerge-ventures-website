<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
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
                <a href="{{ route('admin.orders.index') }}" class="block py-2 px-4 rounded bg-gray-700">Orders</a>
                <a href="{{ route('admin.entrepreneurs.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Entrepreneurs</a>
                <a href="{{ route('admin.digital-skills.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Digital Skills</a>
                <a href="{{ route('admin.services.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Services</a>
                <a href="{{ route('admin.team-members.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Team</a>
                <a href="{{ route('admin.workspace-bookings.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Workspace</a>
                <a href="{{ route('admin.users.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Users</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Orders Management</h2>
                    <p class="text-gray-600">Review and manage customer orders</p>
                </div>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($orders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <div class="font-semibold">{{ $order->order_number }}</div>
                                <div class="text-gray-500">#{{ $order->id }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <div class="font-medium">{{ $order->customer_name }}</div>
                                <div class="text-gray-500 text-xs">{{ $order->customer_email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                MWK {{ number_format($order->total_amount, 0) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                    @elseif($order->status === 'shipped') bg-indigo-100 text-indigo-800
                                    @elseif($order->status === 'delivered') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($order->payment_status === 'paid') bg-green-100 text-green-800
                                    @elseif($order->payment_status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($order->payment_status === 'failed') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    {{ ucfirst($order->payment_status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $order->created_at->format('Y-m-d H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.orders.show', $order) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500">No orders found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                @if(method_exists($orders, 'links'))
                    {{ $orders->links() }}
                @endif
            </div>
        </div>
    </div>
</body>
</html>


