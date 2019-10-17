<?php

namespace App\Http\Controllers\api_sis_email;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CaixaDeMensagens;
use App\Models\Usuario;
use App\Models\MensagemDestinatario;
use Illuminate\Support\Facades\DB;

class ControlMensagem extends Controller
{
  
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
 
    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function enviarMensagem(Request $request){
        /* 
            Criar registro de caixa de entrada pra o respectivo destinatário (para se ter o id da caixa de msgs).
            Receber por post assunto, corpo, tipo_destinatário e id_remetente e id_destinatario.
            Ordem de criação dos registros: caixa de msgs, mensagem, destinatário e msg_x_destinatario.
        */

        $mensagem = $request->all();
       
        $assunto = $mensagem['assunto'];
        $corpo = $mensagem['corpo'];
        $destinatarios = $mensagem['destinatarios']; 
        $idUsuarioRemetente = $mensagem['id_usuario_remetente'];


                                /** Caixa de Mensagens **/
        /** Remetente **/

        //Verifica se o remetente existe
        $remetente = Usuario::findOrFail($idUsuarioRemetente);
        //Cria ou retorna a caixa de mensagens enviadas do remetente
        $idCaixaDeEnviados = ControlMensagem::criarCaixaDeMensagens($idUsuarioRemetente, "enviados");

        /** Destinatário **/

        for($i=0; $i<count($destinatarios);$i++){
            $idsUsuariosDestinatarios[] = $destinatarios[$i]['id_usuario_destinatario'];
            $tiposDestinatarios[] = $destinatarios[$i]['tipo_destinatario'];
            //Verifica se destinatário existe
            Usuario::findOrFail($idsUsuariosDestinatarios[$i]);
            //Cria ou retorna a caixa de entrada do destinatário
            $idsCaixasDeEntrada[] = ControlMensagem::criarCaixaDeMensagens($idsUsuariosDestinatarios[$i], "entrada"); 
        }
        
        
                                    /** Mensagem **/

        //Cria registro de mensagem para o remetente (que fica associado a caixa de mensagens enviadas do mesmo)      
        $idMensagemEnviada = DB::table('mensagems')->insertGetId(
            ['assunto' => $assunto, 'corpo' => $corpo, 'id_caixa_de_mensagens'=> $idCaixaDeEnviados]
        );
 
        //Cria registros de mensagens para os destinatários (que ficam associados às suas respectivas caixas de entrada)
        for($i=0; $i<count($idsCaixasDeEntrada); $i++){
            $idsMensagensRecebidas[] = DB::table('mensagems')->insertGetId(
                ['assunto' => $assunto, 'corpo' => $corpo, 'id_caixa_de_mensagens'=> $idsCaixasDeEntrada[$i]]
            );
        }

                                 /** Destinatários **/           
        for($i=0; $i<count($idsUsuariosDestinatarios); $i++){
            $idsDestinatarios[] = ControlMensagem::criarDestinatario($tiposDestinatarios[$i], $idsUsuariosDestinatarios[$i]);
        } 


                                /** Mensagem_x_Destinatário **/
        for($i=0; $i<count($idsDestinatarios); $i++){
            DB::table('mensagem_destinatarios')->insert(
                ['id_mensagem' => $idsMensagensRecebidas[$i], 'id_destinatario' => $idsDestinatarios[$i]]
            );
        }       


        return $mensagem;
        
    }

    //Esta fuñção cria ou retorna uma caixa de mensagens já existente associada ao usuário (podendo ser do tipo "entrada" ou "enviados")
    public static function criarCaixaDeMensagens($idUsuario, $tipo){
            //Consulta de caixa de mensagens do tipo passado que pertença ao id do usuário
            if($tipo == "enviados"){
                $CaixaDeMensagens = DB::table('caixa_de_mensagens')->select('id')->where('tipo', '=', 'enviados')->where('id_usuario', '=', $idUsuario)->get();
            }else if($tipo == "entrada"){
                $CaixaDeMensagens = DB::table('caixa_de_mensagens')->select('id')->where('tipo', '=', 'entrada')->where('id_usuario', '=', $idUsuario)->get();
            }
            //Verifica se a caixa de mensagens já existe ou não
            if($CaixaDeMensagens == "[]"){//não tem caixa de mensagens
                $idCaixaDeMensagens = DB::table('caixa_de_mensagens')->insertGetId(
                    ['tipo' => $tipo, 'id_usuario' => $idUsuario]
                );
                return $idCaixaDeMensagens;
            }else{//tem caixa de mensagens
                $idCaixaDeMensagens = $CaixaDeMensagens[0]->id;
                return $idCaixaDeMensagens;
            }
    }

    //Cria ou retorna um destinatário 
    public static function criarDestinatario($tipoDestinatario, $idUsuarioDestinatario){
            //Consulta do destinatário
            if($tipoDestinatario == "para"){
                $destinatario = DB::table('destinatarios')->select('id')->where('tipo', '=', 'para')->where('id_usuario', '=', $idUsuarioDestinatario)->get();
            }else if($tipoDestinatario == "cc"){
                $destinatario = DB::table('destinatarios')->select('id')->where('tipo', '=', 'cc')->where('id_usuario', '=', $idUsuarioDestinatario)->get();
            }else if($tipoDestinatario == "cco"){
                $destinatario = DB::table('destinatarios')->select('id')->where('tipo', '=', 'cco')->where('id_usuario', '=', $idUsuarioDestinatario)->get();
            }

            //Verifica se a consulta retornou algo (se destinatário existe)
            if($destinatario == "[]"){//não existe
                $idDestinatario = DB::table('destinatarios')->insertGetId(
                    ['tipo' => $tipoDestinatario, 'id_usuario' => $idUsuarioDestinatario]
                );
                return $idDestinatario ;
            }else{//existe
                $idDestinatario = $destinatario[0]->id;
                return $idDestinatario ;
            }
    }
}
