<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Author extends Model
{
    protected $fillable = [
        'name',
        'email',
        'bio',
        'github_handle',
        'twitter_handle'
    ];
    // public function posts(): HasMany
    // {
    //     return $this->hasMany(Post::class, 'author_id');
    // }
}
