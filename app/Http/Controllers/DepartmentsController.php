<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;


class DepartmentsController extends Controller
{

    public function index()
    {
        $departments = Department::all();
        return response()->json(['data' => $departments]);
    }

    public function save(Request $request)
    {
        $this->validate($request, ['name' => ['required']]);
        $department = Department::create($request->all());
        return response()->json(['message' => 'Department created successfully', 'data' => $department]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => ['required']]);
        $department = Department::findOrFail($id);
        $department->update($request->all());
        return response()->json(['message' => 'Department created successfully', 'data' => $department]);
    }

    public function destroy($id)
    {
        Department::findOrFail($id)->delete();
        return response()->json(['message' => 'Department deleted successfully']);
    }
}
