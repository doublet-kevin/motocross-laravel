<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Circuit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    public $timestamps = false;
}
