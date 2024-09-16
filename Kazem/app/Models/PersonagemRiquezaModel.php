<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonagemRiquezaModel extends Model
{
    use HasFactory;

    public $table = "personagem_riqueza";

    public $primaryKey = "id_personagem";

    public $fillable = [
        "id_personagem",
        "qtd_pc",
        "qtd_pp",
        "qtd_pe",
        "qtd_po",
        "qtd_pl"
    ];
}
