<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class EscolaMagiaModel extends Model
{
    use HasFactory;

    public $table = "escola_magia";

    public $primaryKey = "id_escola_magia";

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
                    'campo' => "id_escola_magia",
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
                    'url' => 'escolamagia/form/',
                    'args' => [
                        'id_escola_magia'
                    ],
                    'classe' => 'far fa-edit'
                ]
            ]
        );
    }
}
