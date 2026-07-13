<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeuanganModel extends Model
{
    use HasFactory;

    // Sesuaikan nama tabel dengan yang ada di database kamu (misal: 'keuangan' atau 'laporan_keuangan')
    protected $table = 'keuangan';

    protected $primaryKey = 'id_keuangan';

    protected $fillable = [
        'id_pemilik',
        'id_admin',
        'tanggal',
        'jenis_transaksi',
        'nominal',
        'keterangan',
        'status'
    ];

    // Relasi ke tabel Pemilik (Sesuaikan nama model dan kolom dengan milik Anda)
    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'id_pemilik', 'id_pemilik');
    }

    // Relasi ke tabel Admin (Sesuaikan nama model dan kolom dengan milik Anda)
    public function admin()
    {
        return $this->belongsTo(AdminModel::class, 'id_admin', 'id_admin');
    }
}
