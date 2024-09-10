<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PersonagemModel extends Model
{
    use HasFactory;

    public $table = "jogador";

    public $primaryKey = "id_jogador";

    public $filalble = [
        "nome",
        "status"
    ];

    protected function exibir(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "descricao" => '#',
                    'campo' => "id_jogador",
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
                    'url' => 'jogador/form/',
                    'args' => [
                        'id_jogador'
                    ],
                    'classe' => 'fas fa-edit'
                ]
            ]
        );
    }
}
