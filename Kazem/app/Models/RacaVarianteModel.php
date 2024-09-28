<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\RacaModel;


class RacaVarianteModel extends Model
{
    use HasFactory;

    public $table = "raca_variante";

    public $primaryKey = "id_raca_variante";

    public $filalble = [
        "nome",
        "id_raca",
        "descricao"
    ];

    public function RacaPai()
    {
        return $this->hasOne(RacaModel::class, "id_raca", "id_raca");
    }

    protected function exibir(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "descricao" => '#',
                    'campo' => "id_raca_variante",
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
                    'url' => 'racavariante/',
                    'args' => [
                        'id_raca',
                        'id_raca_variante'
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
                    'class'=> 'col-9'
                ], 
                [
                    "name" => 'descricao',
                    "label" => "Descrição",
                    'type' => 'textarea',
                    'class'=> 'col-12'
                ], 
                [
                    "name" => 'aproveitar_descricao',
                    "label" => "Aproveitar texto da classe original",
                    'type' => 'sim_nao',
                    'class'=> 'col-12'
                ], 
            ]
        );
    }
}
