<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;

    // Menentukan nama tabel
    protected $table = 'produk';

    // Menentukan primary key (karena bukan 'id' bawaan Laravel)
    protected $primaryKey = 'id_produk';

    // Kolom yang diizinkan untuk diisi secara massal
    protected $fillable = [
        'id_pemilik',
        'id_admin',
        'nama',
        'merk',
        'speksifikasi',
        'harga',
        'gambar'
    ];
}