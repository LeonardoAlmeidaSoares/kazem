<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class EquipamentoModel extends Model
{
    use HasFactory;

    public $table = "equipamento";

    public $primaryKey = "id_equipamento";

    public $filalble = [
        "nome",
        "valor",
        "unidade",
        "peso",
        "descricao"
    ];

    public function valorArma(): Attribute
    {
        return new Attribute(
            get: fn () => strval($this->valor) .' ' . $this->unidade
        );
    }

    protected function exibir(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "descricao" => '#',
                    'campo' => "id_equipamento",
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
                    'descricao' => 'Valor',
                    'campo' => 'valorArma',
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
                    'url' => 'equipamento/form/',
                    'args' => [
                        'id_equipamento'
                    ],
                    'classe' => 'far fa-edit'
                ]
            ]
        );
    }
}
