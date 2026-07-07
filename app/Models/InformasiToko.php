<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiToko extends Model
{
    use HasFactory;

    protected $table = 'informasi_toko';
    protected $primaryKey = 'id_informasi_toko';

    protected $fillable = [
        'id_pemilik',
        'nama_toko',
        'kategori_utama',
        'alamat_lengkap',
        'email_kontak',
        'nomor_telepon',
        'store_banner',
        'jam_operasional',
    ];

    // Otomatis convert JSON ke Array PHP saat diakses
    protected $casts = [
        'jam_operasional' => 'array',
    ];

    // Relasi balik ke Pemilik
    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'id_pemilik', 'id_pemilik');
    }
}