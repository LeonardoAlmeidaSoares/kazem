<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class AntecedenteModel extends Model
{
    use HasFactory;

    public $table = "antecedente";

    public $primaryKey = "id_antecedente";

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
                    'campo' => "id_antecedente",
                    'link' => null,
                    'id' => true
                ], 
                [
                    'descricao' => "Nome",
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
                    'url' => 'antecedente/form/',
                    'args' => [
                        'id_antecedente'
                    ],
                    'classe' => 'far fa-edit'
                ]
            ]
        );
    }
}
