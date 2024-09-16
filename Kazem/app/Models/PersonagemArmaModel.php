<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PersonagemArmaModel extends Model
{
    use HasFactory;
    public $table = "personagem_arma";

    public $primaryKey = "id_personagem";

    public $fillable = [
        "id_personagem",
        "id_arma",
        "equipado"
    ];

    public function arma(): HasOne
    {
        return $this->hasOne(ArmaModel::class, "id_arma", "id_arma");
    }
}
