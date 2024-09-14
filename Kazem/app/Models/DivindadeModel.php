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
                    'classe' => 'far fa-edit'
                ]
            ]
        );
    }
}
