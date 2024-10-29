<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Manypost extends Model
{
    protected $fillable = [
        'name'
    ];

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Manytag::class, 'taggable');
    }
}
