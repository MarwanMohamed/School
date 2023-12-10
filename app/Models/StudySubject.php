<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudySubject extends Model
{
    protected $fillable = ['name', 'success_score', 'final_score', 'department_id'];

    public function department()
    {
    	return $this->belongsTo(Department::class);
    }
}
