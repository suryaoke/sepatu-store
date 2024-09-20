<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Brands extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nama', 'foto', 'slug'];


    // Fungsi ini akan dijalankan setiap kali model disimpan
    public static function boot()
    {
        parent::boot();

        // Buat slug saat data baru dibuat
        static::creating(function ($brand) {
            $brand->slug = Str::slug($brand->nama);
        });

        // Update slug ketika name diubah
        static::updating(function ($brand) {
            if ($brand->isDirty('nama')) {
                $brand->slug = Str::slug($brand->nama);
            }
        });
    }

    public function sepatus(): HasMany
    {
        return $this->hasMany(Sepatu::class);
    }
}
