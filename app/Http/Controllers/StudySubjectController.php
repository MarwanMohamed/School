<?php

namespace App\Http\Controllers;

use App\Models\StudySubject;
use Illuminate\Http\Request;

class StudySubjectController extends Controller
{
    public function index()
    {
        $subjects = StudySubject::all();

        return response()->json(['data' => $subjects]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => ['required'],
            'success_score'  => 'required|integer',
            'final_score'  => 'required|integer',
            'department_id'  => 'required',
        ]);

        $subject = StudySubject::create($request->all());
        return response()->json(['message' => 'Subject created successfully', 'data' => $subject]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => ['required'],
            'success_score'  => 'required|integer',
            'final_score'  => 'required|integer',
            'department_id'  => 'required',
        ]);

        $subject = StudySubject::find($id);
        $subject->update($request->all());
        return response()->json(['message' => 'Subject updated successfully', 'data' => $subject]);
    }


    public function destroy($id)
    {
        StudySubject::find($id)->delete();
        return response()->json(['message' => 'Subject deleted successfully']);
    }
}
