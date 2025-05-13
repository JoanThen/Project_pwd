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
    Schema::create('kategoris', function (Blueprint $table) { // Use 'kategoris' here
        $table->id();
        $table->string('nama');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('kategoris'); // Use 'kategoris' here
}

};
