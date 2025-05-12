<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->string('id_peminjaman', 20)->primary();
            $table->string('id_buku', 20);
            $table->string('id_siswa', 20);
            $table->string('id_petugas', 20);
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->string('status_peminjaman', 50);
        
            $table->foreign('id_buku')->references('id_buku')->on('bukus')->onDelete('cascade');
            $table->foreign('id_siswa')->references('id_siswa')->on('siswas')->onDelete('cascade');
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas')->onDelete('cascade');
        });
        
    }

    
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
