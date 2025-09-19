<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DigitalSkill;
use App\Models\DigitalSkillApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DigitalSkillController extends Controller
{
    public function index()
    {
        $digitalSkills = DigitalSkill::paginate(15);
        return view('admin.digital-skills.index', compact('digitalSkills'));
    }

    public function create()
    {
        return view('admin.digital-skills.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'duration_hours' => 'nullable|integer|min:1',
            'level' => 'required|in:beginner,intermediate,advanced',
            'max_participants' => 'nullable|integer|min:1',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'is_active' => 'boolean',
            'featured' => 'boolean',
            'prerequisites' => 'nullable|array',
            'prerequisites.*' => 'nullable|string',
            'learning_outcomes' => 'nullable|array',
            'learning_outcomes.*' => 'nullable|string',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string',
            'image' => 'nullable|url',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active');
        $validated['featured'] = $request->has('featured');

        // Process arrays to remove empty values
        foreach (['prerequisites', 'learning_outcomes', 'features'] as $field) {
            if (isset($validated[$field])) {
                $validated[$field] = array_values(array_filter($validated[$field]));
            } else {
                $validated[$field] = [];
            }
        }

        DigitalSkill::create($validated);

        return redirect()->route('admin.digital-skills.index')
            ->with('success', 'Digital skill created successfully.');
    }

    public function show(DigitalSkill $digitalSkill)
    {
        return view('admin.digital-skills.show', compact('digitalSkill'));
    }

    public function edit(DigitalSkill $digitalSkill)
    {
        return view('admin.digital-skills.edit', compact('digitalSkill'));
    }

    public function update(Request $request, DigitalSkill $digitalSkill)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'duration_hours' => 'nullable|integer|min:1',
            'level' => 'required|in:beginner,intermediate,advanced',
            'max_participants' => 'nullable|integer|min:1',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'is_active' => 'boolean',
            'featured' => 'boolean',
            'prerequisites' => 'nullable|array',
            'prerequisites.*' => 'nullable|string',
            'learning_outcomes' => 'nullable|array',
            'learning_outcomes.*' => 'nullable|string',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string',
            'image' => 'nullable|url',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active');
        $validated['featured'] = $request->has('featured');

        // Process arrays to remove empty values
        foreach (['prerequisites', 'learning_outcomes', 'features'] as $field) {
            if (isset($validated[$field])) {
                $validated[$field] = array_values(array_filter($validated[$field]));
            } else {
                $validated[$field] = [];
            }
        }

        $digitalSkill->update($validated);

        return redirect()->route('admin.digital-skills.index')
            ->with('success', 'Digital skill updated successfully.');
    }

    public function destroy(DigitalSkill $digitalSkill)
    {
        $digitalSkill->delete();
        return redirect()->route('admin.digital-skills.index')
            ->with('success', 'Digital skill deleted successfully.');
    }
}