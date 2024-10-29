<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_visible'

    ];
    // public function posts(): HasMany
    // {
    //     return $this->hasMany(Category::class, 'category_id');
    // }
}
