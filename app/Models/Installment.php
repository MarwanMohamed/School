<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    protected $fillable = ['student_group_id', 'study_group_id', 'student_id', 'amount', 'date', 'paid_on'];
}
