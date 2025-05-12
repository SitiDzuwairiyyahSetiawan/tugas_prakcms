<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->string('id_siswa', 20)->primary();
            $table->bigInteger('nisn');
            $table->string('nama', 100);
            $table->string('kelas', 50);
            $table->text('alamat');
            $table->string('nomor_telepon', 15);
            $table->string('email', 100);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
