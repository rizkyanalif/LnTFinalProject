<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fakturs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idBarang')->reference('id')->on('barangs');
            $table->foreignId('idUser')->reference('id')->on('users');
            $table->string('namaBarang');
            $table->string('fotoBarang');
            $table->string('hargaBarang');
            $table->string('categoryBarang');
            $table->string('kuantitas');
            $table->string('alamatPengiriman');
            $table->string('kodePos');
            $table->string('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fakturs');
    }
};
