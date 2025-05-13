<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_create_peminjamans_table.php
public function up()
{
    Schema::create('peminjamans', function (Blueprint $table) {
        $table->id(); // This should create an auto-incrementing unsigned big integer as the primary key

        $table->string('nama_peminjam');
        $table->unsignedBigInteger('barang_id');
        $table->integer('jumlah');
        $table->date('tanggal_pinjam');
        $table->timestamps();

        $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
