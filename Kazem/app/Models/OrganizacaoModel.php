<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrganizacaoModel extends Model
{
    use HasFactory;

    public $table = "organizacao";

    public $primaryKey = "id_organizacao";

    public $fillable = [
        "nome",
        "descricao", 
        "id_cidade", 
        "id_tipo_organizacao",
        "bandeira",
        "alinhamento"
    ];

    public function tipo(): HasOne
    {
        return $this->hasOne(TipoOrganizacaoModel::class, "id_tipo_organizacao", "id_tipo_organizacao");
    }

    protected function exibir(): Attribute
    {
        return Attribute::make(
            get: fn () => 
            [
                [
                    "descricao" => '#',
                    'campo' => "id_organizacao",
                    'link' => null,
                    'id' => true
                ], 
                [
                    'descricao' => "Nome",
                    'campo' => 'nome',
                    'link' => null,
                    'id' => false
                ]  ,
                [
                    'descricao' => 'Tipo',
                    'campo' => 'nome',
                    'link' => null,
                    'id' => false,
                    'parent' => 'Tipo'
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
                    'url' => 'organizacao/form/',
                    'args' => [
                        'id_organizacao'
                    ],
                     'title' => 'Editar',
                    'classe' => 'mdi mdi-tooltip-edit'
                ]
            ]
        );
    }

}
