<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kontak extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['alamat', 'no_hp', 'email', 'province_id', 'city_id'];
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id', 'id'); // Adjust to match your actual relationship
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id'); // Adjust to match your actual relationship
    }
}
