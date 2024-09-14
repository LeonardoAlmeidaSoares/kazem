<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class ArmaduraModel extends Model
{
    use HasFactory;

    public $table = "armadura";

    public $primaryKey = "id_armadura";

    public $filalble = [
        "nome",
        "valor",
        "unidade",
        "ca",
        "forca_necessaria",
        "desv_furtividade",
        "peso"
    ];

    public function valorArmadura(): Attribute
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
                    'campo' => "id_armadura",
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
                    'campo' => 'valorArmadura',
                    'link' => null,
                    'id' => false,
                ],
                [
                    'descricao' => 'CA',
                    'campo' => 'ca',
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
                    'url' => 'armadura/form/',
                    'args' => [
                        'id_armadura'
                    ],
                    'classe' => 'far fa-edit'
                ]
            ]
        );
    }
}
