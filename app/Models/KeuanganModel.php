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
        'tanggal',
        'jenis_transaksi',
        'nominal',
        'keterangan',
        'status',
    ];
}