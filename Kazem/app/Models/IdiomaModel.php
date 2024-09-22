<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class IdiomaModel extends Model
{
    use HasFactory;

    public $table = "idioma";

    public $primaryKey = "id_idioma";

    public $filalble = [
        "nome",
        "descricao"
    ];

    protected function exibir(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "descricao" => '#',
                    'campo' => "id_idioma",
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
                    "descricao" => 'Descrição',
                    'campo' => "descricao",
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
                    'url' => 'idioma/form/',
                    'args' => [
                        'id_idioma'
                    ],
                     'title' => 'Editar',
                    'classe' => 'mdi mdi-tooltip-edit'
                ]
            ]
        );
    }
}
