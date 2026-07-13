<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    // Menyesuaikan nama tabel di database
    protected $table = 'checkout'; 
    
    // Menyesuaikan Primary Key
    protected $primaryKey = 'id_checkout'; 

    // TAMBAHKAN DUA BARIS INI
    public $incrementing = true;
    protected $keyType = 'int';

    // Mengizinkan mass-assignment untuk kolom-kolom ini
    protected $fillable = [
        'id_pelanggan',
        'tgl_checkout',
        'metode_pembayaran',
        'biaya_ongkir',
        'total_bayar',
        'status_bayar',
        'bukti_bayar',
        'no_resi',      
        'bukti_kirim'
    ];

    // Relasi ke tabel Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(PelangganModel::class, 'id_pelanggan', 'id_pelanggan');
    }

    // Relasi ke tabel Keranjang (Satu checkout punya banyak barang di keranjang)
    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'id_checkout', 'id_checkout');
    }
}