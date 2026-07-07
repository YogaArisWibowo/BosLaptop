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
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk');

            $table->unsignedBigInteger('id_pelanggan')->nullable();
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->unsignedBigInteger('id_pemilik')->nullable();

            $table->string('nama');
            $table->string('merk');
            $table->text('speksifikasi');
            $table->integer('harga');
            $table->string('gambar')->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('set null');
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('set null');
            $table->foreign('id_pemilik')->references('id_pemilik')->on('pemilik')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
