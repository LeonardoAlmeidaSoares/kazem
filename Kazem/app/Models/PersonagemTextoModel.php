<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonagemTextoModel extends Model
{
    use HasFactory;
    public $table = "personagem_texto";

    public $primaryKey = "id_personagem";

    public $fillable = [
        "id_personagem",
        "personalidade",
        "ideais",
        "vinculos",
        "defeitos",
        "carac_tracos",
        "aliados", 
        "carac_tracos_adicionais",
        "tesouro",
        "historico"
    ];
}
