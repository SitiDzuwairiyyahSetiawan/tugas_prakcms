<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $primaryKey = 'id_siswa'; // pastikan ini sesuai dengan struktur DB

    protected $fillable = [
        'nisn', 'nama', 'kelas', 'alamat', 'nomor_telepon', 'email'
    ];
}

