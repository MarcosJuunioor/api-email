<?php

namespace App\Http\Controllers\api_sis_email;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CaixaDeMensagens;
use App\Models\Token;
use Illuminate\Support\Facades\DB;

class ControlCaixaDeMensagens extends Controller
{

    public function listarCaixasDeMensagens($token, $idUsuario)
    {
        $tokenAux = DB::table('tokens')->select('token')->where('id_usuario', '=', $idUsuario)->get();
        
        if($tokenAux[0]->token === $token){
            $caixasDeMensagens = DB::table('caixa_de_mensagens')->select('*')->where('id_usuario', '=', $idUsuario)->get();
            //return $caixasDeMensagens;
            return $caixasDeMensagens;
        }else{
            return 0;
        } 

    }


    public function store(Request $request)
    {
        //
    }


    public function recuperarCaixa($idCaixa, $token)
    {
       $tokenAux = DB::table('tokens')->select('token')->where('$token', '=', $token)->get();
        
        if($tokenAux == $token){
            $caixaDeMensagens = DB::table('caixa_de_mensagens')->select('*')->where('id', '=', $idCaixa)->get();
            return $caixaDeMensagens;
        }else{
            return 0;
        } 
           
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
