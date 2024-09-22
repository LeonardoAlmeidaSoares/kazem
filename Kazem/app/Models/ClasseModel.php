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
        "descricao",
        "dado_vida"
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
                    'class'=> 'col-10'
                ], 
                [
                    "name" => 'dado_vida',
                    "label" => "Dado de Vida",
                    'type' => 'select',
                    'content' => ['4' => 'D4', '6'=> 'D6', '8' => 'D8', '10' => 'D10', '12' => 'D12'],
                    'class'=> 'col-2'
                ], 
                [
                    "name" => 'descricao',
                    "label" => "Descrição",
                    'type' => 'textarea',
                    'class'=> 'col-12'
                ], 
                [
                    "name" => 'somente_npc',
                    "label" => "Somente NPCs",
                    'type' => 'sim_nao',
                    'class'=> 'col-12'
                ], 
            ]
        );
    }
}
