<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SepatuFoto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'foto',
        'sepatu_id',

    ];
    public function sepatus(): BelongsTo
    {
        return $this->belongsTo(Sepatu::class);
    }
}
