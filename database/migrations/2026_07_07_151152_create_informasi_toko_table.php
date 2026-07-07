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
        Schema::create('informasi_toko', function (Blueprint $table) {
            $table->id('id_informasi_toko');
            // Relasi ke tabel pemilik
            $table->unsignedBigInteger('id_pemilik'); 
            
            $table->string('nama_toko');
            $table->string('kategori_utama');
            $table->text('alamat_lengkap');
            $table->string('email_kontak');
            $table->string('nomor_telepon');
            
            // Aset gambar banner
            $table->string('store_banner')->nullable();
            
            // Kolom dinamis untuk menyimpan jam operasional (hari & jam)
            $table->json('jam_operasional')->nullable(); 
            
            $table->timestamps();

            // Set Foreign Key Constraint
            $table->foreign('id_pemilik')
                  ->references('id_pemilik')
                  ->on('pemilik')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_toko');
    }
};
