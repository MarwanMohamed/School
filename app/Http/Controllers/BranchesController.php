<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return response()->json(['data' => $branches]);
    }

    public function show($id)
    {
        $branch = Branch::find($id);
        $branch['student_groups'] = $branch->studentGroup;
        return response()->json(['data' => $branch]);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'telephone' => ['required', 'max:15'],
            'contact_person' => ['required', 'min:3'],
            'contact_person_mobile' => ['required', 'max:15'],
            'address' => 'required|min:4',
        ]);

        $branch = Branch::create($request->all());
        return response()->json(['message' => 'Branch created successfully', 'data' => $branch]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'telephone' => ['required', 'max:15'],
            'contact_person' => ['required', 'min:3'],
            'contact_person_mobile' => ['required', 'max:15'],
            'address' => 'required',
        ]);

        $branch = Branch::findOrFail($id);
        $branch->update($request->all());
        return response()->json(['message' => 'Branch updated successfully', 'data' => $branch]);
    }

    public function destroy($id)
    {
        Branch::findOrFail($id)->delete();
        return response()->json(['message' => 'Branch deleted successfully']);
    }
}
