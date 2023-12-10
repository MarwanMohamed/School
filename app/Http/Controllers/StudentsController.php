<?php

namespace App\Http\Controllers;

use App\Events\FireEmail;
use App\Http\Requests\StudentRequest;
use App\Jobs\ProcessStudents;
use App\Mail\StudentCreate;
use App\Models\Student;
use App\Notifications\StudentNotifiy;
use Illuminate\Support\Facades\Mail;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::with('exams')->get();
        return response()->json(['data' => $students]);
    }

    public function store(StudentRequest $request)
    {
        $data = $request->all();
        $data['code'] = rand(1, 100000);
        $data['study_category_id'] = $request->study_category_id;
        $data['student_group_id'] = $request->student_group_id;
        $data['department_id'] = $request->department_id;

        $student = Student::create($data);

        FireEmail::dispatch($student);


        return response()->json(['message' => 'Student created successfully', 'data' => $student]);
    }


    public function update(StudentRequest $request, $id)
    {
        $student = Student::where('id', $id)->first();
        $student->update(['username', $request->username, 'email' => $request->email]);
        return response()->json(['message' => 'Student created successfully', 'data' => $student]);
    }


    public function destroy($id)
    {
        Student::find($id)->delete();
        return response()->json(['message' => 'Student deleted successfully']);
    }
}
