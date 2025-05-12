<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan
    protected $table = 'dendas';

    // Tentukan primary key jika tidak menggunakan id secara otomatis
    protected $primaryKey = 'id_denda';
    public $incrementing = true;
    public $timestamps = false; // jika tabel tidak menggunakan timestamps (created_at, updated_at)

    // Tentukan kolom-kolom yang dapat diisi
    protected $fillable = [
        'id_peminjaman',
        'jumlah_denda_perhari',
        'total_denda',
        'status_pembayaran',
        'tanggal_pembayaran',
    ];

    // Relasi dengan model Peminjaman
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }
}
