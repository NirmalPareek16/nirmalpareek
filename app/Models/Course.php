<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'id',
        'course_name',
        'course_type',
        'class',
        'price'
    ];
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
