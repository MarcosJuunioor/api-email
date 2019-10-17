<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaixaDeMensagens extends Model
{
    protected $fillable = [
        'tipo', 'id_usuario',
    ];
}
