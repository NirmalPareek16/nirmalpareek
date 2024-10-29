<?php

namespace App\Models;

use App\Models\Manypost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class  Manytag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Manypost::class, 'taggable');
    }

    public function videos(): MorphToMany
    {
        return $this->morphedByMany(ManyVideo::class, 'taggable');
    }

    public function taggable()
    {
        return $this->morphedByMany(Taggable::class, 'taggable');
    }
}
