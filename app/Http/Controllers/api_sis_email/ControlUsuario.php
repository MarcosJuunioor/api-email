<?php

namespace App\Http\Controllers\api_sis_email;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Token;
use Illuminate\Support\Facades\DB;

class ControlUsuario extends Controller
{

    public function index()
    {
        return Usuario::all();
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $senha = $dados['senha'];
        $senhaCodificada = md5($senha);
        $dados['senha'] = $senhaCodificada;

        return Usuario::create($dados);
    }   

    public function show($token)
    {
        //Consulta o id do usuário que possui o token passado como parâmetro.
        $usuario = DB::table('tokens')->select('id_usuario')->where('token', '=', $token)->get();

        //Verifica se o usuário foi encontrado.
        if($usuario != "[]"){
            //Retorna o registro do usuário associado ao token.
            return Usuario::findOrFail($usuario[0]->id_usuario);
        }else{
            return 0;
        }
    }


    public function login(Request $request){
        $dados = $request->all();

        $email = $dados['email'];
        $senha = $dados['senha'];
        $senhaCodificada = md5($senha);
        
        //Consulta do usuário pelo email e senha. Retorna um vetor de "objetos usuario".
        $usuario = DB::table('usuarios')->select('id')->where('email', '=', $email)->where('senha', '=', $senhaCodificada)->get();
        
        //Verifica se o usuário foi encontrado.
        if($usuario != "[]"){
            $idUsuario = $usuario[0]->id;
            $token = ControlUsuario::gerarCodigo(32);

            //Verfica se já existe um token para o usuário. Se existir, acontece um update com o segundo dado passado. Caso não, um novo registro será criado com a junção dos dados (token e id_usuario).
            DB::table('tokens')->updateOrInsert(
                ['id_usuario' => $idUsuario],
                ['token' => $token]
            ); 

            //Vetor para ser transformado em JSON no return.
            $jsonToken = ["token"=>$token];

            return $jsonToken;
        }else{
            return 0;
        }

        
    }

    public static function gerarCodigo($length){

        $salt = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $len = strlen($salt);
        $pass = '';

        mt_srand(10000000*(double)microtime());

        for($i = 0; $i < $length; $i++){
            $pass .= $salt[mt_rand(0,$len - 1)];
        }

        return $pass;
    }

}
