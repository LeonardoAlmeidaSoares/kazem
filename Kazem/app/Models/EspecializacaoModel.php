<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecializacaoModel extends Model
{
    use HasFactory;

    public $table = "especializacao";

    public $primaryKey = "id_especializacao";

    public $filalble = [
        "nome",
        "descricao",
        'id_classe'
    ];

    protected function exibir(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "descricao" => '#',
                    'campo' => "id_especializacao",
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
                    'url' => 'especializacao/form/',
                    'args' => [
                        'id_especializacao'
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
                    "name" => 'id_classe',
                    "label" => "Classe",
                    'type' => 'model',
                    'content' => \App\Models\ClasseModel::all(),
                    'content_key' => 'id_classe',
                    'content_value' => 'nome',
                    'class'=> 'col-6'
                ],
                [
                    "name" => 'descricao',
                    "label" => "Descrição",
                    'type' => 'textarea',
                    'class'=> 'col-12'
                ]
            ]
        );
    }
}

