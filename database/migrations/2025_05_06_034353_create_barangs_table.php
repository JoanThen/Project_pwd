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
        if (!Schema::hasTable('barangs')) {
            Schema::create('barangs', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
              $table->string('foto')->nullable();
                $table->text('deskripsi')->nullable();
                $table->unsignedBigInteger('kategori_id')->nullable();
                $table->integer('stok')->default(0);
                $table->timestamps();

             $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('set null');

            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
