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
        Schema::create('checkout', function (Blueprint $table) {
        $table->id('id_checkout');
        
        $table->unsignedBigInteger('id_pelanggan');
        
        $table->dateTime('tgl_checkout');
        $table->string('metode_pembayaran');
        $table->integer('biaya_ongkir');
        $table->integer('total_bayar');
        $table->string('status_bayar');
        $table->string('bukti_bayar')->nullable();
        $table->timestamps();

        // Foreign Key
        $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout');
    }
};
