<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;

    protected $table = 'dendas';
    protected $primaryKey = 'id_denda';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id_denda',
        'id_peminjaman',
        'jumlah_denda_perhari',
        'total_denda',
        'status_pembayaran',
        'tanggal_pembayaran'
    ];
}
