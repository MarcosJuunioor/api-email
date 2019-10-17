<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('assunto', 100);
            $table->text('corpo');
            $table->unsignedBigInteger('id_caixa_de_mensagens');
            $table->foreign('id_caixa_de_mensagens')->references('id')->on('caixa_de_mensagens');
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
        Schema::dropIfExists('mensagems');
    }
}
