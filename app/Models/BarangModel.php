<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'm_barang';

    // Primary key
    protected $primaryKey = 'barang_id';

    // Auto increment
    public $incrementing = true;

    // Tipe primary key
    protected $keyType = 'int';

    // Timestamp otomatis
    public $timestamps = true;

    // Kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'kategori_id',
        'barang_kode',
        'barang_nama',
        'harga_beli',
        'harga_jual'
    ];

    /**
     * Relasi ke model kategori, kalau ada
     * Sesuaikan nama model kategori yang kamu pakai!
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }
}
