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
                    'title' => 'Editar', 
                    'classe' => 'mdi mdi-tooltip-edit'
                ]
            ]
        );
    }

    protected function form(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "name" => 'nome',
                    "label" => "Nome",
                    'type' => 'text',
                    'class'=> 'col-6'
                ], 
                [
                    "name" => 'tipo',
                    "label" => "Tipo",
                    'type' => 'select',
                    'content'=> ['Perfurante' => "Perfuração", 'Concussivo' => 'Concussão', 'Cortante' => 'Cortante'],
                    'class'=> 'col-2'
                ], 
                [
                    "name" => 'dano',
                    "label" => "Dano",
                    'type' => 'text',
                    'class'=> 'col-1'
                ],
                [
                    "name" => 'peso',
                    "label" => "Peso",
                    'type' => 'text',
                    'class'=> 'col-1'
                ], 
                [
                    "name" => 'valor',
                    "label" => "Valor",
                    'type' => 'valor_unidade',
                    'class'=> 'col-2'
                ], 
              
            ]
        );
    }

}
