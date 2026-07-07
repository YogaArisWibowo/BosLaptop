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
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id('id_keranjang');

            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_checkout')->nullable(); // Kosong jika belum di-checkout

            $table->integer('jumlah');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade');
            $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('cascade');
            $table->foreign('id_checkout')->references('id_checkout')->on('checkout')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};
