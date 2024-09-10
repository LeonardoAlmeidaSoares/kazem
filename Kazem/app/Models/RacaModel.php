<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class RacaModel extends Model
{
    use HasFactory;

    public $table = "raca";

    public $primaryKey = "id_raca";

    public $filalble = [
        "titulo"
    ];

    protected function exibir(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "descricao" => '#',
                    'campo' => "id_raca",
                    'link' => null,
                    'id' => true
                ], 
                [
                    'descricao' => "Descrição",
                    'campo' => 'titulo',
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
                    'url' => 'raca/form/',
                    'args' => [
                        'id_raca'
                    ],
                    'classe' => 'far fa-edit'
                ]
            ]
        );
    }

}
