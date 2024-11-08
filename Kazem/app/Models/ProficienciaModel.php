<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProficienciaModel extends Model
{
    use HasFactory;

    public $table = "proficiencia";

    public $primaryKey = "id_proficiencia";

    public $filalble = [
        "nome",
        "descricao",
    ];

    protected function exibir(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "descricao" => '#',
                    'campo' => "id_proficiencia",
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
                    'url' => 'proficiencia/form/',
                    'args' => [
                        'id_proficiencia'
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
                    'class'=> 'col-12'
                ], 
                [
                    "name" => 'descricao',
                    "label" => "Descrição",
                    'type' => 'textarea',
                    'class'=> 'col-12'
                ], 
            ]
        );
    }

}
