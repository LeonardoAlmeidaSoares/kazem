<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class DivindadeModel extends Model
{
    use HasFactory;

    public $table = "divindade";

    public $primaryKey = "id_divindade";

    public $filalble = [
        "nome",
        "alcunha",
        "alinhamento",
        "dominios",
        "posto",
        "arma_predileta",
        "aspecto",
        "descricao"
    ];


    protected function exibir(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "descricao" => '#',
                    'campo' => "id_divindade",
                    'link' => null,
                    'id' => true
                ], 
                [
                    "descricao" => 'nome',
                    'campo' => "nome",
                    'link' => null,
                    'id' => false
                ], 
                [
                    'descricao' => "Alinhamento",
                    'campo' => 'alinhamento',
                    'link' => null,
                    'id' => false
                ],
                [
                    'descricao' => 'Dominios',
                    'campo' => 'dominios',
                    'link' => null,
                    'id' => false,
                ],
                [
                    'descricao' => 'Posto',
                    'campo' => 'posto',
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
                    'url' => 'divindade/form/',
                    'args' => [
                        'id_divindade'
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
                    'class'=> 'col-3'
                ],
                [
                    "name" => 'alcunha',
                    "label" => "Alcunha",
                    'type' => 'text',
                    'class'=> 'col-6'
                ],
                [
                    "name" => 'alinhamento',
                    "label" => "Alinhamento",
                    'type' => 'select',
                    'content' => [
                        'L/B' => "Leal e Bom", 
                        "L/N" => "Leal e Neutro",
                        'L/M' => "leal e Mau",
                        'N/B' => "Neutro e Bom", 
                        "N/N" => "Neutro",
                        'N/M' => "Neutro e Mau",
                        'C/B' => "Caótico e Bom", 
                        "C/N" => "Caótico e Neutro",
                        'C/M' => "Caótico e Mau",
                    ],
                    'class'=> 'col-3'
                ],
                [
                    "name" => 'dominios',
                    "label" => "Domínios",
                    'type' => 'text',
                    'class'=> 'col-3'
                ],
                [
                    "name" => 'posto',
                    "label" => "Posto",
                    'type' => 'select',
                    'content' => [
                        'Menor' => "Menor", 
                        "Intermediario" => "Intermediário",
                        'Maior' => "Maior",
                    ],
                    'class'=> 'col-3'
                ],
                [
                    "name" => 'aspecto',
                    "label" => "Aspectos",
                    'type' => 'text',
                    'class'=> 'col-3'
                ],
                [
                    "name" => 'arma_predileta',
                    "label" => "Arma Predileta",
                    'type' => 'text',
                    'class'=> 'col-3'
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
