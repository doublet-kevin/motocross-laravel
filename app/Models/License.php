<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class License extends Model
{
    use HasFactory;

    protected $filable = [
        'license_number',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public $timestamps = false;
}
