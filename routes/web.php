<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Models\DigitalSkill;

Route::get('/', function () {
    $featuredSkills = DigitalSkill::where('featured', true)
        ->where('is_active', true)
        ->orderBy('created_at', 'desc')
        ->take(6)
        ->get();
    return view('index', ['digitalSkills' => $featuredSkills]);
});

Route::get('/dashboard', function () {
    if (auth()->user()->isManager()) {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Products Management
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    
    // Orders Management
    Route::get('orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('orders.show');
    Route::patch('orders/{order}/status', [App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    
    // Entrepreneurs Management
    Route::get('entrepreneurs', [App\Http\Controllers\Admin\EntrepreneurController::class, 'index'])->name('entrepreneurs.index');
    Route::get('entrepreneurs/create', [App\Http\Controllers\Admin\EntrepreneurController::class, 'create'])->name('entrepreneurs.create');
    Route::post('entrepreneurs', [App\Http\Controllers\Admin\EntrepreneurController::class, 'store'])->name('entrepreneurs.store');
    Route::get('entrepreneurs/{entrepreneur}', [App\Http\Controllers\Admin\EntrepreneurController::class, 'show'])->name('entrepreneurs.show');
    Route::get('entrepreneurs/{entrepreneur}/edit', [App\Http\Controllers\Admin\EntrepreneurController::class, 'edit'])->name('entrepreneurs.edit');
    Route::put('entrepreneurs/{entrepreneur}', [App\Http\Controllers\Admin\EntrepreneurController::class, 'update'])->name('entrepreneurs.update');
    Route::patch('entrepreneurs/{entrepreneur}/status', [App\Http\Controllers\Admin\EntrepreneurController::class, 'updateStatus'])->name('entrepreneurs.updateStatus');
    Route::delete('entrepreneurs/{entrepreneur}', [App\Http\Controllers\Admin\EntrepreneurController::class, 'destroy'])->name('entrepreneurs.destroy');
    
    // Digital Skills Management
    Route::resource('digital-skills', App\Http\Controllers\Admin\DigitalSkillController::class);
    
    // Services Management
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
    
    // Team Management
    Route::resource('team-members', App\Http\Controllers\Admin\TeamMemberController::class);
    
    // Workspace Bookings Management
    Route::get('workspace-bookings', [App\Http\Controllers\Admin\WorkspaceBookingController::class, 'index'])->name('workspace-bookings.index');
    Route::get('workspace-bookings/{workspaceBooking}', [App\Http\Controllers\Admin\WorkspaceBookingController::class, 'show'])->name('workspace-bookings.show');
    Route::patch('workspace-bookings/{workspaceBooking}/status', [App\Http\Controllers\Admin\WorkspaceBookingController::class, 'updateStatus'])->name('workspace-bookings.updateStatus');
    
    // Users Management
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::patch('users/{user}/ban', [App\Http\Controllers\Admin\UserController::class, 'ban'])->name('users.ban');
    Route::patch('users/{user}/unban', [App\Http\Controllers\Admin\UserController::class, 'unban'])->name('users.unban');
    Route::post('users/{user}/impersonate', [App\Http\Controllers\Admin\UserController::class, 'impersonate'])->name('users.impersonate');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/co-workspace', function () {
    return view('co-workspace');
});
Route::get('/coming-soon', function () {
    return view('coming-soon');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/digital-skills', [App\Http\Controllers\DigitalSkillController::class, 'index'])->name('digital-skills.index');
Route::get('/entrepreneur-application', function () {
    return view('entrepreneur-application');
});
Route::get('/entrepreneurs', [App\Http\Controllers\EntrepreneurController::class, 'index'])->name('entrepreneurs.index');
Route::get('/entrepreneurs/{entrepreneur}', [App\Http\Controllers\EntrepreneurController::class, 'show'])->name('entrepreneurs.show');
Route::get('/full-profile/{entrepreneur?}', [App\Http\Controllers\EntrepreneurController::class, 'show'])->name('full-profile'); // Legacy route
Route::get('/other-services', [App\Http\Controllers\ServiceController::class, 'index'])->name('services.index');
Route::get('/our-team', [App\Http\Controllers\TeamController::class, 'index'])->name('team.index');
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/api/products', [App\Http\Controllers\ShopController::class, 'getProducts'])->name('api.products');
Route::get('/api/products/{product}', [App\Http\Controllers\ShopController::class, 'show'])->name('api.products.show');
Route::post('/api/orders', [App\Http\Controllers\ShopController::class, 'placeOrder'])->name('api.orders.store');

// Test route to verify data
Route::get('/test-shop-data', function() {
    $products = App\Models\Product::with('category')->where('status', 'active')->get();
    $categories = App\Models\Category::where('is_active', true)->get();
    
    return response()->json([
        'products_count' => $products->count(),
        'categories_count' => $categories->count(),
        'first_product' => $products->first(),
        'categories' => $categories->pluck('name', 'slug')
    ]);
});
