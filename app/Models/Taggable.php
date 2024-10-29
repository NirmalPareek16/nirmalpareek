<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    protected $fillable = [
        'tag_id'
    ];

    public function tags()
    {
        return $this->belongsTo(Manytag::class, 'tag_id');
    }
}
