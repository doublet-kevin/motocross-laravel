<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'type',
        'number_of_places',
    ];

    public function circuit(): BelongsTo
    {
        return $this->belongsTo(Circuit::class);
    }
}
