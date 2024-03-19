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
        Schema::table('affittuari', function (Blueprint $table) {
            $table->date('inizio_contratto')->nullable();
            $table->integer('canone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('affittuari', function (Blueprint $table) {
            $table->dropColumn('inizio_contratto');
            $table->dropColumn('canone');
        });
    }
};
