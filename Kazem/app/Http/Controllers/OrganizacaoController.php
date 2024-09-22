<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrganizacaoModel;
use App\Models\CidadeModel;
use App\Models\TipoOrganizacaoModel;

class OrganizacaoController extends Controller
{
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        //Listo todas os cadastradas
        $model =  OrganizacaoModel::all(); 

        return view("index", [
            "titulo" => "Organizações",
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {
     
        $tipos = TipoOrganizacaoModel::all();
        $cidades = CidadeModel::all();

        if($id > 0){
            $model = OrganizacaoModel::find($id);
        } else {
            $model = new OrganizacaoModel();
        }

        if ($request->getMethod() == "POST")
        {
            $model->nome = $request->nome;
            $model->descricao = $request->descricao;
            $model->id_cidade = $request->id_cidade;
            $model->id_tipo_organizacao = $request->id_tipo_organizacao;
            
            if ($model->save()){
                return redirect("organizacao")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("_organizacao.form", [
                "model" => $model,
                "tipos" => $tipos,
                "cidades" => $cidades
            ]);
        }
    }
}
