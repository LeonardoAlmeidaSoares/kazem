<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\EscolaMagiaModel;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MagiaModel extends Model
{
    use HasFactory;

    use HasFactory;

    public $table = "magia";

    public $primaryKey = "id_magia";

    public $filalble = [
        "nome",
        "descricao",
        "componentes",
        "ritual",
        "id_escola_magia",
        "tipo_magia",
        "nivel",
        "duracao",
        "alcance",
        "acao"
    ];

    public function EscolaMagia()
    {
        return $this->hasOne(EscolaMagiaModel::class, "id_escola_magia", "id_escola_magia");
    }

    protected function exibir(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "descricao" => '#',
                    'campo' => "id_magia",
                    'link' => null,
                    'id' => true
                ], 
                [
                    'descricao' => "Nome",
                    'campo' => 'nome',
                    'link' => null,
                    'id' => false
                ],
                [
                    'descricao' => 'Escola',
                    'campo' => 'nome',
                    'link' => null,
                    'id' => false,
                    'parent' => 'EscolaMagia'
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
                    'url' => 'magia/form/',
                    'args' => [
                        'id_magia'
                    ],
                    'classe' => 'far fa-edit'
                ]
            ]
        );
    }

}
