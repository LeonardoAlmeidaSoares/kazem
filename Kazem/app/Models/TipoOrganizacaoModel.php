<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoOrganizacaoModel extends Model
{
    use HasFactory;

    public $table = "tipo_organizacao";

    public $primaryKey = "id_tipo_organizacao";

    public $filalble = [
        "nome",
        "descricao"
    ];

}
