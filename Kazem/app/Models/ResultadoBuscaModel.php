<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadoBuscaModel extends Model
{
    use HasFactory;

    public $filalble = [
        "tipo_retorno",
        "link",
        "descricao"
    ];
}
