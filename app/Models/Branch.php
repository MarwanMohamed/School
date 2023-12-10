<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['name', 'telephone', 'contact_person', 'contact_person_mobile', 'address'];

    public function studentGroup()
    {
        return $this->hasMany(StudentGroup::class);
    }
}
