<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Check if the column already exists before adding it
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('admin');
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove the role column when rolling back the migration
            $table->dropColumn('role');
        });
    }
}
