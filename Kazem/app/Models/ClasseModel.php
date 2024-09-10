<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class ClasseModel extends Model
{
    use HasFactory;

    public $table = "classe";

    public $primaryKey = "id_classe";

    public $filalble = [
        "nome",
        "somente_npc",
        "descricao"
    ];

    protected function exibir(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "descricao" => '#',
                    'campo' => "id_classe",
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
                    'url' => 'classe/form/',
                    'args' => [
                        'id_classe'
                    ],
                    'classe' => 'far fa-edit'
                ]
            ]
        );
    }
}
