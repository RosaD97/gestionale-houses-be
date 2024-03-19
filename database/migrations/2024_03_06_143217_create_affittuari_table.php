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
        Schema::create('affittuari', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('cognome', 50);
            $table->string('tipo_contratto');
            $table->unsignedTinyInteger('durata_contratto');
            $table->string('telefono');
            $table->string('email');
            $table->text('note');
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
        Schema::dropIfExists('affittuari');
    }
};
