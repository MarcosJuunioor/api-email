<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensagemDestinatariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagem_destinatarios', function (Blueprint $table) {
            $table->integer('id_mensagem')->unsigned();
            $table->foreign('id_mensagem')->references('id')->on('mensagems');
            $table->integer('id_destinatario')->unsigned();
            $table->foreign('id_destinatario')->references('id')->on('destinatarios');
            $table->primary(['id_mensagem', 'id_destinatario']);
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
        Schema::dropIfExists('mensagem_destinatarios');
    }
}
