<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("ok", function(){
	return ["status"=>true];
});

//usuários
Route::apiResource("usuario", "api_sis_email\ControlUsuario");
Route::post("usuario/login", "api_sis_email\ControlUsuario@login");

//Caixas de mensagens
Route::get("caixas/{token}/{idUsuario}", "api_sis_email\ControlCaixaDeMensagens@listarCaixasDeMensagens");
Route::get("recuperar_caixa/{idCaixa}/{token}", "api_sis_email\ControlCaixaDeMensagens@recuperarCaixa");

//Mensagens
Route::post("mensagens/enviar_mensagem", "api_sis_email\ControlMensagem@enviarMensagem");