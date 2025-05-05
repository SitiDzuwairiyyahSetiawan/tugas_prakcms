<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->string('id_buku', 20)->primary();
            $table->string('judul_buku', 255);
            $table->string('penulis', 100);
            $table->string('penerbit', 100);
            $table->date('tahun_terbit');
            $table->string('isbn', 20);
            $table->string('kategori_buku', 100);
            $table->integer('jumlah_buku_tersedia');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
