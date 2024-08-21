<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'number_of_days_old'
    ];

    public function petWalks(): HasMany
    {
        return $this->hasMany(PetWalks::class);
    }
}
