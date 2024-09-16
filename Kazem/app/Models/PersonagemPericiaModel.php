<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonagemPericiaModel extends Model
{
    use HasFactory;
    public $table = "personagem_pericia";

    public $primaryKey = "id_personagem";

    public $fillable = [
        "id_personagem",
        "id_pericia",
        "valor",
        "treinamento"
    ];
}
