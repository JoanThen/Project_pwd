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
        if (!Schema::hasTable('barangs')) {  // Corrected table name here
            Schema::create('barangs', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->unsignedBigInteger('kategori_id')->nullable();
                $table->integer('stok')->default(0);
                $table->timestamps();
    
                $table->foreign('kategori_id')->references('id')->on('kategoris');  // Corrected foreign key reference
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'barangs' table if it exists
        Schema::dropIfExists('barangs');
    }
};
