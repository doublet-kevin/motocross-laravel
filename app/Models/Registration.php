<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_training',
        'id_user',
        'registration_date',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function training(): HasOne
    {
        return $this->hasOne(Training::class);
    }

    public $timestamps = false;
}
