<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
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
                <a href="{{ route('admin.products.index') }}" class="block py-2 px-4 rounded bg-gray-700">Products</a>
                <a href="{{ route('admin.orders.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Orders</a>
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
                    <h2 class="text-3xl font-bold text-gray-800">Product Details</h2>
                    <p class="text-gray-600">{{ $product->name }}</p>
                </div>
                <div class="space-x-2">
                    <a href="{{ route('admin.products.edit', $product) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Edit Product
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
                        Back to Products
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Product Image -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Product Image</h3>
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-lg">
                    @else
                        <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                            <span class="text-gray-500">No image available</span>
                        </div>
                    @endif
                </div>

                <!-- Product Information -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Product Information</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Name</label>
                            <p class="text-gray-900">{{ $product->name }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Category</label>
                            <p class="text-gray-900">{{ $product->category->name ?? 'N/A' }}</p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Price</label>
                                <p class="text-gray-900">MWK {{ number_format($product->price, 0) }}</p>
                            </div>
                            @if($product->original_price)
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Original Price</label>
                                <p class="text-gray-900">MWK {{ number_format($product->original_price, 0) }}</p>
                            </div>
                            @endif
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Stock Quantity</label>
                                <p class="text-gray-900">{{ $product->stock_quantity }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">SKU</label>
                                <p class="text-gray-900">{{ $product->sku ?? 'N/A' }}</p>
                            </div>
                        </div>

                        @if($product->badge)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Badge</label>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $product->badge }}
                            </span>
                        </div>
                        @endif

                        @if($product->entrepreneur)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Entrepreneur</label>
                            <p class="text-gray-900">{{ $product->entrepreneur }}</p>
                        </div>
                        @endif

                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status</label>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($product->status === 'active') bg-green-100 text-green-800
                                    @elseif($product->status === 'inactive') bg-red-100 text-red-800
                                    @else bg-yellow-100 text-yellow-800 @endif">
                                    {{ ucfirst($product->status) }}
                                </span>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Featured</label>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($product->featured) bg-purple-100 text-purple-800 @else bg-gray-100 text-gray-800 @endif">
                                    {{ $product->featured ? 'Yes' : 'No' }}
                                </span>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">In Stock</label>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($product->in_stock) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                                    {{ $product->in_stock ? 'Yes' : 'No' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Description -->
            <div class="mt-8 bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Description</h3>
                <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                
                @if($product->short_description)
                <div class="mt-4">
                    <h4 class="text-md font-medium mb-2">Short Description</h4>
                    <p class="text-gray-600">{{ $product->short_description }}</p>
                </div>
                @endif
            </div>

            <!-- Timestamps -->
            <div class="mt-8 bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Timestamps</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Created At</label>
                        <p class="text-gray-900">{{ $product->created_at->format('M d, Y H:i') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Updated At</label>
                        <p class="text-gray-900">{{ $product->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>