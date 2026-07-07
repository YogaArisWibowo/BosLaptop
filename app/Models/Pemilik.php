<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InformasiToko;

class Pemilik extends Model
{
    use HasFactory;

    protected $table = 'pemilik';
    protected $primaryKey = 'id_pemilik';

    // Sesuaikan fillable ini dengan struktur kolom tabel pemilik Anda
    protected $fillable = [
        'email',
        'password',
        'nama',
        'no_hp',
        'rekening',
        'e_wallet'
    ];

    // Relasi One-to-One ke Informasi Toko
    public function informasiToko()
    {
        return $this->hasOne(InformasiToko::class, 'id_pemilik', 'id_pemilik');
    }
}