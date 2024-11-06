<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    protected $fillable = [
        'id',
        'name',
        'email',
        'number',
        'status',
        'gender',
        'date_of_birth',
        'address'
    ];
}
