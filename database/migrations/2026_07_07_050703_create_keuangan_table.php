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
        Schema::create('keuangan', function (Blueprint $table) {
            $table->id('id_keuangan');

            $table->unsignedBigInteger('id_admin')->nullable();
            $table->unsignedBigInteger('id_pemilik')->nullable();

            $table->string('jenis_transaksi'); // Misal: Pemasukan / Pengeluaran
            $table->integer('nominal');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('set null');
            $table->foreign('id_pemilik')->references('id_pemilik')->on('pemilik')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangan');
    }
};
