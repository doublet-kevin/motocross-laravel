<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'region',
        'city',
        'postal_code',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function circuits(): HasMany
    {
        return $this->hasMany(Circuit::class);
    }

    public $timestamps = false;
}
