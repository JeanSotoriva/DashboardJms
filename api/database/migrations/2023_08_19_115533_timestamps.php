<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timestamps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('matricula_id');
            $table->timestamp('entrada')->nullable();
            $table->timestamp('saida')->nullable();
            $table->string('localizacao');
            $table->timestamps();
        });
        Schema::table('timestamps', function (Blueprint $table) {
            $table->foreign('matricula_id')->references('matricula')->on('colaborators');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timestamps');
    }
};
