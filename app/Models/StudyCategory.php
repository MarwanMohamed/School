<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyCategory extends Model
{
    protected $fillable = ['name', 'icon', 'type', 'payments', 'description', 'cost', 'pay_every', 'months'];

    public function students()
    {
    	return $this->hasMany(Student::class);
    }
}
