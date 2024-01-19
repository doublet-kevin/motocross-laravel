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
    ];

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class, 'id');
    }

    public $timestamps = false;
}
