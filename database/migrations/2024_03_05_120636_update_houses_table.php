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
            // creiamo la chiave esterna
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->integer('numeroStanze');
            $table->boolean('bagno')->default(false);
            $table->boolean('wifi')->default(false);
            $table->boolean('riscaldamento')->default(false);
            $table->boolean('ariaCondizionata')->default(false);
            $table->boolean('lavatrice')->default(false);
            $table->boolean('parcheggio')->default(false);
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
            Schema::dropIfExists('houses');
        });
    }
};
