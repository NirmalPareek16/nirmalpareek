<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'age',
        'address'
    ];
    public function courses()
    {
        return $this->belongsToMany(Student::class);
    }
}
