<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'icon'];

    public function students()
    {
    	return $this->hasMany(Student::class);
    }

    public function registration()
    {
        return $this->hasOne(Registration::class);
    }
}
