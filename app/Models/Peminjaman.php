<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';
    protected $primaryKey = 'id_peminjaman';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id_peminjaman',
        'id_buku',
        'id_siswa',
        'id_petugas',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'status_peminjaman'
    ];

    // Relasi ke siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    // Relasi ke petugas
    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }

    // Relasi ke buku
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}
