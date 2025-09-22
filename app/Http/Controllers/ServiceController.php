<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)
            ->orderBy('featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('other-services', compact('services'));
    }

    /**
     * Display the specified service.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedServices = Service::where('is_active', true)
            ->where('id', '!=', $service->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('services.show', compact('service', 'relatedServices'));
    }
}