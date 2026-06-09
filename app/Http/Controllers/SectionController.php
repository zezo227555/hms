<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::with('branch')
            ->latest()
            ->paginate(15);

        return view('sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::active()
            ->orderBy('name')
            ->get();

        return view('sections.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'branch_id' => ['required', 'exists:branches,id'],

            'name' => ['required', 'string', 'max:100'],

            'code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('sections')
                    ->where(fn ($query) => $query->where('branch_id', $request->branch_id)),
            ],

            'status' => ['required', 'in:active,inactive'],

            'description' => ['nullable', 'string'],
        ]);

        Section::create($validated);

        return redirect()
            ->route('sections.index')
            ->with('success', 'Section created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        $section->load('branch');

        return view('sections.show', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        $branches = Branch::active()
            ->orderBy('name')
            ->get();

        return view('sections.edit', compact('section', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $validated = $request->validate([
            'branch_id' => ['required', 'exists:branches,id'],

            'name' => ['required', 'string', 'max:100'],

            'code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('sections')
                    ->where(fn ($query) => $query->where('branch_id', $request->branch_id))
                    ->ignore($section->id),
            ],

            'status' => ['required', 'in:active,inactive'],

            'description' => ['nullable', 'string'],
        ]);

        $section->update($validated);

        return redirect()
            ->route('sections.index')
            ->with('success', 'Section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();

        return redirect()
            ->route('sections.index')
            ->with('success', 'Section deleted successfully.');
    }

    /**
     * Activate section.
     */
    public function activate(Section $section)
    {
        $section->activate();

        return back()->with(
            'success',
            'Section activated successfully.'
        );
    }

    /**
     * Deactivate section.
     */
    public function deactivate(Section $section)
    {
        $section->deactivate();

        return back()->with(
            'success',
            'Section deactivated successfully.'
        );
    }
}
