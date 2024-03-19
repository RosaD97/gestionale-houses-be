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
        Schema::create('pagamenti', function (Blueprint $table) {
            $table->id();
            // creiamo la chiave esterna 
            $table->unsignedBigInteger('affittuario_id');
            $table->foreign('affittuario_id')
                ->references('id')
                ->on('affittuari')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagamenti');
    }
};
