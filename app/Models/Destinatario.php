<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinatario extends Model
{
   protected $fillable = [
        'tipo', 'id_usuario',
    ];
}
