<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Sepatu extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'harga',
        'ket',
        'stock',
        'popular',
        'brands_id',
        'kategori_id',
        'berat'
    ];

    public static function boot()
    {
        parent::boot();

        // Buat slug saat data baru dibuat
        static::creating(function ($sepatu) {
            $sepatu->slug = Str::slug($sepatu->nama);
        });

        // Update slug ketika name diubah
        static::updating(function ($sepatu) {
            if ($sepatu->isDirty('nama')) {
                $sepatu->slug = Str::slug($sepatu->nama);
            }
        });
    }

    public function kategoris(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function brands(): BelongsTo
    {
        return $this->belongsTo(Brands::class);
    }

    public function sepatuFoto(): HasMany
    {
        return $this->hasMany(SepatuFoto::class, 'sepatu_id');
    }

    public function scopeSearch($query, $term)
    {
        return $query->where('nama', 'LIKE', '%' . $term . '%');
    }
    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(transaksi::class);
    }
    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }
}
