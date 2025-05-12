<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';
    protected $primaryKey = 'id_siswa';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'id_siswa',
        'nisn', 
        'nama',
        'kelas',
        'alamat',
        'nomor_telepon',
        'email'
    ];

    protected $casts = [
        'nisn' => 'string',
    ];
}