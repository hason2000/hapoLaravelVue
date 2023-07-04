<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phonenumber')->nullable();
            $table->string('address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('username')->nullable();
            $table->string('avata_url')->nullable();
            $table->tinyInteger('role')->default(0);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phonenumber');
            $table->dropColumn('address');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('username');
            $table->dropColumn('avata_url');
            $table->dropColumn('role');
            $table->dropSoftDeletes();
        });
    }
}
