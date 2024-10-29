<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    protected $fillable = [
        'model',
        'mechanic_id'
    ];
    public function machanic(): BelongsTo
    {
        return $this->belongsTo(Mechanic::class, 'mechanic_id');
    }
}
