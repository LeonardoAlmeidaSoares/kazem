<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class ArmaModel extends Model
{
    use HasFactory;

    public $table = "arma";

    public $primaryKey = "id_arma";

    public $filalble = [
        "nome",
        "tipo",
        "valor",
        "unidade",
        "dano",
        "peso",
        "propriedades",
        "descricao"
    ];

    public function valorArma(): Attribute
    {
        return new Attribute(
            get: fn () => strval($this->valor) .' ' . $this->unidade
        );
    }

    protected function exibir(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "descricao" => '#',
                    'campo' => "id_arma",
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
                    'descricao' => 'Valor',
                    'campo' => 'valorArma',
                    'link' => null,
                    'id' => false,
                ],
                [
                    'descricao' => 'Dano',
                    'campo' => 'dano',
                    'link' => null,
                    'id' => false,
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
                    'url' => 'arma/form/',
                    'args' => [
                        'id_arma'
                    ],
                    'classe' => 'far fa-edit'
                ]
            ]
        );
    }

}
