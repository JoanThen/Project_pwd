<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('kategoris', function (Blueprint $table) {
            if (!Schema::hasColumn('kategoris', 'deskripsi')) {
                $table->text('deskripsi')->nullable()->after('nama');
            }
        });
    }

    public function down()
    {
        Schema::table('kategoris', function (Blueprint $table) {
            $table->dropColumn('deskripsi');
        });
    }
};
