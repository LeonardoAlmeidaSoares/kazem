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
                    UNION
                    select 'Armas' as Tipo, nome, 'Armas', concat('arma/form/', id_arma) as link from kz_arma
					UNION
                    select 'Armaduras' as Tipo, nome, 'Armaduras', concat('armadura/form/', id_armadura) as link from kz_armadura
                    UNION
                    select 'Equipamentos' as Tipo, descricao, 'Equipamentos', concat('equipamentos/form/', id_equipamento) as link from kz_equipamento
                    UNION
                    select 'Divindades' as Tipo, nome, 'Divindades', concat('divindades/form/', id_divindade) as link from kz_divindade
                    ) x
                where titulo like '%$termo%'";

        $results =  DB::select($sql);

        //dd($results);
        
        return view("resultados_busca", [
            "retorno" => $results,
            "termo" => $termo
        ]);   

    }
}
