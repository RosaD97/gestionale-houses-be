<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->string('provincia')->nullable();
            $table->string('citta')->nullable();
            $table->string('via')->nullable();
            $table->integer('cap')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->dropColumn('provincia');
            $table->dropColumn('citta');
            $table->dropColumn('via');
            $table->dropColumn('cap');
        });
    }
};
