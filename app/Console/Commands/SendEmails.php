<?php

namespace App\Console\Commands;

use App\Mail\StudentCreate;
use App\Models\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{

    protected $signature = 'send:email';


    protected $description = 'Sending Email';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $students = Student::all();

        foreach ($students as $student) {
            Mail::to($student->email)->send(new StudentCreate());
        }

    }
}
