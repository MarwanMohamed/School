<?php

namespace App\Jobs;

use App\Mail\StudentCreate;
use App\Notifications\StudentNotifiy;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProcessStudents implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $student;

    public function __construct($student)
    {
        $this->student = $student;
    }


    public function handle()
    {
        Mail::to($this->student->email)->send(new StudentCreate());

        $this->student->notify(new StudentNotifiy());

        Mail::to($this->student->email)->send(new StudentCreate());

        $this->student->notify(new StudentNotifiy());

        Mail::to($this->student->email)->send(new StudentCreate());

        $this->student->notify(new StudentNotifiy());

        Mail::to($this->student->email)->send(new StudentCreate());

        $this->student->notify(new StudentNotifiy());

        Mail::to($this->student->email)->send(new StudentCreate());

        $this->student->notify(new StudentNotifiy());


    }
}
