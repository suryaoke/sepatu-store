<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('trx_id');
            $table->string('proof');
            $table->unsignedBigInteger('total_sepatu');
            $table->unsignedBigInteger('total_harga');
            $table->string('bayar');
            $table->foreignIdFor(\App\Models\Sepatu::class)->constrained();
            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
