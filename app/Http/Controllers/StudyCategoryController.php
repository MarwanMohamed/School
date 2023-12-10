<?php

namespace App\Http\Controllers;

use App\Models\StudyCategory;
use Illuminate\Http\Request;

class StudyCategoryController extends Controller
{
    public function index()
    {
        $groups = StudyCategory::all();
        return response()->json(['data' => $groups]);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:5'],
            'payments' => 'required|numeric',
            'months' => 'required|numeric',
            'pay_every' => 'required|numeric',
            'cost' => 'required|numeric',
        ]);
        $group = StudyCategory::create($request->all());
        return response()->json(['message' => 'Study Category created successfully', 'data' => $group]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'min:5'],
            'payments' => 'required|numeric',
            'months' => 'required|numeric',
            'pay_every' => 'required|numeric',
            'cost' => 'required|numeric',
        ]);
        $group = StudyCategory::findOrFail($id);
        $group->update($request->all());
        return response()->json(['message' => 'Study Category updated successfully', 'data' => $group]);
    }

    public function destroy($id)
    {
        StudyCategory::findOrFail($id)->delete();
        return response()->json(['message' => 'Study Category deleted successfully']);
    }
}
