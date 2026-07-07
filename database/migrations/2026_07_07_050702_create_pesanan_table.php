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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('id_pesanan');

            // Relasi 1 to 1 dari checkout ke pesanan
            $table->unsignedBigInteger('id_checkout');
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->unsignedBigInteger('id_pemilik')->nullable();

            $table->dateTime('tgl_order');
            $table->integer('harga');
            $table->string('status');
            $table->string('kurir');
            $table->string('resi')->nullable();
            $table->text('alamat');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('id_checkout')->references('id_checkout')->on('checkout')->onDelete('cascade');
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('set null');
            $table->foreign('id_pemilik')->references('id_pemilik')->on('pemilik')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
