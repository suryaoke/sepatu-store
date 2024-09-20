<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaksi extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'trx_id',
        'proof',
        'total_sepatu',
        'total_harga',
        'status',
        'user_id',
        'sepatu_id',
        'size_id'

    ];

    public function sepatus(): BelongsTo
    {
        return $this->belongsTo(Sepatu::class, 'sepatu_id', 'id'); // Adjust to match your actual relationship
    }
  
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
