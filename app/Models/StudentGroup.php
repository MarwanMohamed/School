<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    protected $fillable = ['name', 'max', 'start_registration' , 'end_registration', 'start_study', 'end_study', 'first_installment', 'branch_id'];

    public function branch()
    {
    	return $this->belongsTo(Branch::class);
    }
}
