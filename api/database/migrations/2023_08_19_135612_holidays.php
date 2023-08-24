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
        Schema::create('holidays', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('timestamp_id');
            $table->timestamp('data_feriado');
            $table->string('descricao');
            $table->timestamps();
        });
        Schema::table('holidays', function (Blueprint $table) {
            $table->foreign('timestamp_id')->references('id')->on('timestamps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('holidays');
    }
};
