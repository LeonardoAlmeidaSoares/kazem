<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class PersonagemModel extends Model
{
    use HasFactory;

    public $table = "personagem";

    public $primaryKey = "id_personagem";

    public $fillable = [
        "nome",
        "id_raca", 
        "id_antecedente", 
        "id_jogador",
        "id_cidade",
        "id_divindade",
        "alinhamento",
        "imagem",  
    ];

    public function atributos(): HasOne
    {
        return $this->hasOne(PersonagemAtributoModel::class, "id_personagem", "id_personagem");
    }

    public function pericias(): HasMany
    {
        return $this->hasMany(PersonagemPericiaModel::class, "id_personagem", "id_personagem");
    }

    public function texto(): HasOne
    {
        return $this->hasOne(PersonagemTextoModel::class, "id_personagem", "id_personagem");
    }

    public function riqueza(): HasOne
    {
        return $this->hasOne(PersonagemRiquezaModel::class, "id_personagem", "id_personagem");
    }

    public function armas(): HasMany
    {
        return $this->hasMany(PersonagemArmaModel::class, "id_personagem", "id_personagem");
    }

    public function proficiencias(): HasMany
    {
        return $this->hasMany(PersonagemProficienciaModel::class, "id_personagem", "id_personagem");
    }

    protected function exibir(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "descricao" => '#',
                    'campo' => "id_jogador",
                    'link' => null,
                    'id' => true
                ], 
                [
                    'descricao' => "Nome",
                    'campo' => 'nome',
                    'link' => null,
                    'id' => false
                ]                
            ]
        );
    }

    protected function links(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "descricao" => 'edit',
                    'url' => 'personagem/ficha/',
                    'args' => [
                        'id_personagem'
                    ],
                    'title' => 'Ficha',
                    "target" => "_blank",
                    'classe' => 'mdi mdi-account-box-outline'
                ]
            ]
        );
    }
}
