<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();

            $table->string('nama_peminjam');
            $table->unsignedBigInteger('barang_id');
            $table->integer('jumlah');
            $table->date('tanggal_pinjam');

            // Penambahan fitur approval
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamp('approved_at')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->text('keterangan')->nullable();

            // Relasi pengguna yang meminjam
            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            // Foreign keys
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
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
