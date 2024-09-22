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

    protected function form(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "name" => 'nome',
                    "label" => "Nome",
                    'type' => 'text',
                    'class'=> 'col-6'
                ], 
                [
                    "name" => 'ca',
                    "label" => "CA",
                    'type' => 'text',
                    'class'=> 'col-1'
                ], 
                [
                    "name" => 'forca_necessaria',
                    "label" => "Força",
                    'type' => 'text',
                    'class'=> 'col-1'
                ],
                [
                    "name" => 'peso',
                    "label" => "Peso",
                    'type' => 'text',
                    'class'=> 'col-2'
                ], 
                [
                    "name" => 'valor',
                    "label" => "Valor",
                    'type' => 'valor_unidade',
                    'class'=> 'col-2'
                ], 
               
                [
                    "name" => 'desv_furtividade',
                    "label" => "Desvantagem em Furtividade",
                    'type' => 'sim_nao',
                    'class'=> 'col-12'
                ], 
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
                    "title" => "Editar",
                    'classe' => 'mdi mdi-tooltip-edit'
                ]
            ]
        );
    }
}
