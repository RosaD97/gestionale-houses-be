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
            // creiamo la chiave esterna
            $table->unsignedBigInteger('house_id');
            $table->foreign('house_id')
                ->references('id')
                ->on('houses')
                ->cascadeOnDelete();
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
            // Rimuovi la chiave esterna
            $table->dropForeign(['house_id']);
            // Rimuovi la colonna house_id
            $table->dropColumn('house_id');
        });
    }
};
