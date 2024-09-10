<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MagiaModel;
use App\Models\EscolaMagiaModel;

class MagiaController extends Controller
{
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        //Listo todas os cadastradas
        $model =  MagiaModel::all(); 

        return view("_magia.index", [
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {
     
        $escolas = EscolaMagiaModel::all();

        if($id > 0){
            $model = MagiaModel::find($id);
        } else {
            $model = new MagiaModel();
        }

        if ($request->getMethod() == "POST")
        {
            $model->nome = $request->nome;
            $model->descricao = $request->descricao;
            $model->id_escola_magia = $request->id_escola_magia;
            $model->nivel = $request->nivel;
            $model->componentes = $request->componentes;
            $model->ritual = $request->ritual;
            $model->tipo_magia = $request->tipo_magia;
            $model->duracao = $request->duracao;
            $model->alcance = $request->alcance;
            $model->acao = $request->acao;

            if ($model->save()){
                return redirect("magia")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("_magia.form", [
                "model" => $model,
                "escolas" => $escolas
            ]);
        }
    }

}
