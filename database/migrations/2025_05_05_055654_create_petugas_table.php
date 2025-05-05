<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->string('id_petugas', 20)->primary();
            $table->string('nama', 100);
            $table->string('username', 50)->unique();
            $table->string('password', 100);
            $table->string('email', 100)->unique();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
