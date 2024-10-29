<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class UploadVideo extends Model
{
    protected $fillable = [
        'id',
        'title',
        'url'
    ];

    public function comment(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
