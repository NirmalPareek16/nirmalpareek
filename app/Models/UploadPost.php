<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class UploadPost extends Model
{
    protected $fillable = [
        'id',
        'title',
        'body'
    ];

    public function comment(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
