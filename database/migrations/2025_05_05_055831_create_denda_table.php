<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dendas', function (Blueprint $table) {
            $table->id();
            $table->decimal('jumlah_denda_perhari', 10, 2);
            $table->decimal('total_denda', 10, 2);
            $table->string('status_pembayaran', 50)->default('belum lunas', 'lunas');
            $table->date('tanggal_pembayaran')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dendas');
    }
};
