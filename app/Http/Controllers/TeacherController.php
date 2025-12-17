<?php


namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource. (R - Index)
     */
    public function index()
    {
        $teachers = Teacher::paginate(15);
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource. (C - Create)
     */
    public function create()
    {
        // This method simply returns the view for the creation form.
        return view('teachers.create'); 
    }

    /**
     * Store a newly created resource in storage. (C - Store)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|max:100',
            'gender' => 'required|in:M,F',
            'degree' => 'required|max:50',
            'tel' => 'required|unique:teachers|max:15',
        ]);

        Teacher::create($validated);

        return redirect()->route('teachers.index')
            ->with('success', 'Teacher created successfully.');
    }

    /**
     * Display the specified resource. (R - Show)
     */
    public function show(Teacher $teacher)
    {
        // This method passes the Teacher model instance to the show view.
        return view('teachers.show', compact('teacher'));
    }
    
    /**
     * Show the form for editing the specified resource. (U - Edit)
     */
    public function edit(Teacher $teacher)
    {
        // This method passes the Teacher model instance to the edit form view.
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage. (U - Update)
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'full_name' => 'required|max:100',
            'gender' => 'required|in:M,F',
            'degree' => 'required|max:50',
            // Ignore unique check on the current record
            'tel' => 'required|max:15|unique:teachers,tel,' . $teacher->tid . ',tid',
        ]);

        $teacher->update($validated);

        return redirect()->route('teachers.index')
            ->with('success', 'Teacher updated successfully.');
    }

    /**
     * Remove the specified resource from storage. (D - Destroy)
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')
            ->with('success', 'Teacher deleted successfully.');
    }
}