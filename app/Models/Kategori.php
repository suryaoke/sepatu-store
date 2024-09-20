<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Kategori extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nama', 'foto', 'ket'];


    public static function boot()
    {
        parent::boot();

        // Buat slug saat data baru dibuat
        static::creating(function ($kategori) {
            $kategori->slug = Str::slug($kategori->nama);
        });

        // Update slug ketika name diubah
        static::updating(function ($kategori) {
            if ($kategori->isDirty('nama')) {
                $kategori->slug = Str::slug($kategori->nama);
            }
        });
    }
    public function sepatus(): HasMany
    {
        return $this->hasMany(Sepatu::class);
    }
}
