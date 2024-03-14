<?php

namespace App\Http\Controllers;

use App\Models\SubjectArea;
use Illuminate\Http\Request;

class SubjectAreaController extends Controller
{
    public function index()
    {
        return SubjectArea::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:subject_areas',
        ]);

        $subjectArea = SubjectArea::create($request->all());

        return response()->json(['message' => 'Subject area created successfully', 'data' => $subjectArea], 201);
    }

    public function show($id)
    {
        return SubjectArea::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $subjectArea = SubjectArea::findOrFail($id);

        $request->validate([
            'name' => 'required|string|unique:subject_areas,name,' . $subjectArea->id,
        ]);

        $subjectArea->update($request->all());

        return response()->json(['message' => 'Subject area updated successfully', 'data' => $subjectArea]);
    }

    public function destroy($id)
    {
        $subjectArea = SubjectArea::findOrFail($id);
        $subjectArea->delete();

        return response()->json(['message' => 'Subject area deleted successfully']);
    }
}
