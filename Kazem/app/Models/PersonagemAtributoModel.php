<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonagemAtributoModel extends Model
{
    use HasFactory;
    public $table = "personagem_atributo";

    public $primaryKey = "id_personagem";

    public $fillable = [
        "id_personagem",
        "attr_forca",
        "attr_destreza",
        "attr_constituicao",
        "attr_sabedoria",
        "attr_inteligencia",
        "attr_carisma",
        "prof_forca",
        "prof_destreza",
        "prof_constituicao",
        "prof_sabedoria",
        "prof_inteligencia",
        "prof_carisma"
    ];
}
