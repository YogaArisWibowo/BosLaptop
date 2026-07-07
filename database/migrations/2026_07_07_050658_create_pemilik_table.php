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
        Schema::create('pemilik', function (Blueprint $table) {
            $table->id('id_pemilik');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('no_hp');
            $table->string('rekening')->nullable();
            $table->text('alamat');
            $table->string('e_wallet')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemilik');
    }
};
