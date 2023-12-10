<?php

namespace App\Models;

use App\Exam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use Notifiable;

    protected $fillable = [
        'username', 'gender', 'email', 'photo', 'country', 'date', 'code', 'student_group_id', 'study_category_id', 'department_id'
    ];

    public function setPhotoAttribute($value)
    {
        $name = time() . '_' . $value->getClientoriginalName();
        $value->move('uploads', $name);
        $this->attributes['photo'] = $name;
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_students');
    }

}
