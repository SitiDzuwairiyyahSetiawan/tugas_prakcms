<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Denda extends Model
{
    use HasFactory;

    protected $table = 'dendas';
    protected $primaryKey = 'id_denda';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_denda', 
        'id_peminjaman',
        'jumlah_denda_perhari',
        'total_denda',
        'status_pembayaran',
        'tanggal_pembayaran',
    ];

    // Boot method untuk auto-generate ID
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            if (empty($model->id_denda)) {
                $model->id_denda = 'DN' . strtoupper(Str::random(10));
            }
        });
    }

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }
}