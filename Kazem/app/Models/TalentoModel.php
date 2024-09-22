<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class TalentoModel extends Model
{
    use HasFactory;

    public $table = "talento";

    public $primaryKey = "id_talento";

    public $filalble = [
        "nome",
        "descricao",
        "pre_requisito"
    ];

    protected function exibir(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "descricao" => '#',
                    'campo' => "id_talento",
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
                    'descricao' => 'Pré-Requisito',
                    "campo" => 'pre_requisito',
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
                    'url' => 'talento/form/',
                    'args' => [
                        'id_talento'
                    ],
                     'title' => 'Editar',
                    'classe' => 'mdi mdi-tooltip-edit'
                ]
            ]
        );
    }
}
