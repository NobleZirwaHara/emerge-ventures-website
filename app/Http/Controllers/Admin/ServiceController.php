<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::paginate(15);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'nullable|numeric|min:0',
            'pricing_type' => 'required|in:fixed,hourly,monthly,yearly,custom',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
            'delivery_time_days' => 'nullable|integer|min:1',
            'is_active' => 'boolean',
            'featured' => 'boolean',
        ]);

        // Handle features array
        if (isset($validated['features']) && is_array($validated['features'])) {
            $validated['features'] = array_values(array_filter($validated['features']));
        } else {
            $validated['features'] = [];
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services', 'public');
            $validated['image'] = $path;
        }

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');
        $validated['featured'] = $request->has('featured');

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'nullable|numeric|min:0',
            'pricing_type' => 'required|in:fixed,hourly,monthly,yearly,custom',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
            'delivery_time_days' => 'nullable|integer|min:1',
            'is_active' => 'boolean',
            'featured' => 'boolean',
        ]);

        // Handle features array
        if (isset($validated['features']) && is_array($validated['features'])) {
            $validated['features'] = array_values(array_filter($validated['features']));
        } else {
            $validated['features'] = [];
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $path = $request->file('image')->store('services', 'public');
            $validated['image'] = $path;
        }

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');
        $validated['featured'] = $request->has('featured');

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}