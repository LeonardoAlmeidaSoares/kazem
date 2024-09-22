<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CidadeModel extends Model
{
    use HasFactory;

    public $table = "cidade";

    public $primaryKey = "id_cidade";

    public $filalble = [
        "nome",
        "id_continente",
        "descricao"
    ];

    public function Continente()
    {
        return $this->hasOne(ContinenteModel::class, "id_continente", "id_continente");
    }

    protected function exibir(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "descricao" => '#',
                    'campo' => "id_cidade",
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
                    'descricao' => 'Continente',
                    'campo' => 'nome',
                    'link' => null,
                    'id' => false,
                    'parent' => 'Continente'
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
                    'url' => 'cidade/form/',
                    'args' => [
                        'id_cidade'
                    ],
                    'title' => 'Editar',
                    'classe' => 'mdi mdi-tooltip-edit'
                ]
            ]
        );
    }
}
