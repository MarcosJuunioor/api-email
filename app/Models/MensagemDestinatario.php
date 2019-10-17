<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MensagemDestinatario extends Model
{
    protected $fillable = [
        'id_mensagem', 'id_destinatario',
    ];
}
