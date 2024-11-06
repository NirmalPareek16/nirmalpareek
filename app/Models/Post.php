<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'published_date',
        'tags',
        'image',
        'author_id',
        'category_id'
    ];
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // public function latestOrder()
    // {
    //     return $this->hasOne(Category::class)->latestOfMany();
    // }
    // public function largestOrder()
    // {
    //     return $this->hasOne(Category::class)->ofMany('price', 'max');
    // }
}
