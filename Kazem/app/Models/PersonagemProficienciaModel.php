<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PersonagemProficienciaModel extends Model
{
    use HasFactory;
    public $table = "personagem_proficiencia";

    public $primaryKey = "id_personagem";

    public $fillable = [
        "id_personagem",
        "id_proficiencia"
    ];

    public function proficiencia(): HasOne
    {
        return $this->hasOne(ProficienciaModel::class, "id_proficiencia", "id_proficiencia");
    }
}
