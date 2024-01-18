<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circuit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    public $timestamps = false;
}
