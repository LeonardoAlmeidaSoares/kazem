<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\AntecedenteModel;
use App\Models\ResultadoBuscaModel;


class BuscaController extends Controller
{
    public function index(Request $request)
    {
        $termo = $request->busca;


        $sql = "SELECT * FROM
            (select 'Antecedentes' as Tipo, titulo, descricao, concat('antecedente/form/', id_antecedente) as link from kz_antecedente
                    UNION
                    select 'Classes' as Tipo, nome as titulo, descricao, concat('classe/form/', id_classe) as link from kz_classe
                    UNION 
                    select 'Escolas de Magia' as Tipo, nome as titulo, descricao, concat('escolamagia/form/', id_escola_magia) as link from kz_escola_magia
                    UNION 
                    select 'Magias' as Tipo, nome as titulo, descricao, concat('magia/form/', id_magia) as link from kz_magia
                    UNION
                    select 'Raças' as Tipo, titulo, 'Raça de Personagem', concat('raca/form/', id_raca) as link from kz_raca
                    UNION 
                    select 'Idiomas' as Tipo, nome, descricao, concat('idioma/form/', id_idioma) as link from kz_idioma
                    UNION 
                    select 'Cidades' as Tipo, nome, descricao, concat('cidade/form/', id_cidade) as link from kz_cidade
                    UNION 
                    select 'Continentes' as Tipo, nome, 'Continente do cenário', concat('continente/form/', id_continente) as link from kz_continente
                    UNION 
                    select 'Talento' as Tipo, nome, descricao, concat('talento/form/', id_talento) as link from kz_talento
                    ) x
                where titulo like '%$termo%'";

        $results =  DB::select($sql);
        
        return view("_busca.index", [
            "retorno" => $results,
            "termo" => $termo
        ]);   

    }
}
