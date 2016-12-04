<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Atracoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atracoes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 70);
            $table->string('tipoAtracao', 30);
            $table->string('endereco', 80);
            $table->string('cidade', 30);
            $table->string('telefone', 15)->nullable();
            $table->string('email', 80)->nullable();
            $table->string('site')->nullable();
            $table->string('foto')->nullable();
            $table->text('descricao')->nullable();
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
        Schema::dropIfExists('atracoes');
    }
}
