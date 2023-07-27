<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(CustomField::class, 'custom_fields')
            ->withPivot('value')
            ->withTimestamps();
    }
}
