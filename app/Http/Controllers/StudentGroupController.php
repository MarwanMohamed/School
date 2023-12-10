<?php

namespace App\Http\Controllers;

use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{

    public function index()
    {
        $groups = StudentGroup::all();
        return response()->json(['data' => $groups]);
    }

    public function show($id)
    {
        $group = StudentGroup::find($id);
        $group['branch'] = $group->branch;
        return response()->json(['data' => $group]);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name'              => ['required', 'min:5'],
            'max'               => 'required|numeric',
            'start_registration' => 'required',
            'end_registration'  => 'required',
            'start_study'       => 'required',
            'end_study'         => 'required',
            'branch_id'         => 'required',
        ]);
        $group = StudentGroup::create($request->all());
        return response()->json(['message' => 'Student Group created successfully', 'data' => $group]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'              => ['required', 'min:5'],
            'max'               => 'required|numeric',
            'start_registration' => 'required',
            'end_registration'  => 'required',
            'start_study'       => 'required',
            'end_study'         => 'required',
            'branch_id'         => 'required',
        ]);
        $group = StudentGroup::findOrFail($id);
        $group->update($request->all());
        return response()->json(['message' => 'Student Group update successfully', 'data' => $group]);
    }


    public function destroy($id)
    {
        StudentGroup::findOrFail($id)->delete();
        return response()->json(['message' => 'Student Group deleted successfully']);
    }
}
