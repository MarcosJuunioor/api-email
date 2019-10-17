<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $fillable = [
        'assunto', 'corpo','id_caixa_de_mensagens',
    ];
}
