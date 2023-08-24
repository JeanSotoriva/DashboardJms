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
        Schema::create('colaborators', function (Blueprint $table) {
            $table->increments('matricula');
            $table->unsignedBigInteger('usuario_id');
            $table->string('cpf')->unique();
            $table->string('nome');
            $table->string('email')->unique();
            $table->unsignedBigInteger('telefone')->unique();
            $table->string('cargo');
            $table->string('funcao');
            $table->timestamp('data_nascimento');
            $table->timestamp('data_admissao');
            $table->timestamp('data_recisao')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('ativo');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('colaborators', function (Blueprint $table) {
            $table->foreign('usuario_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colaborators');
    }
};
