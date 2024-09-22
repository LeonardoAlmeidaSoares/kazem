<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EscolaMagiaModel;

class EscolaMagiaController extends Controller
{
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        //Listo todas os cadastradas
        $model =  EscolaMagiaModel::all(); 

        return view("index", [
            "titulo" => "Escolas de Magia",
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {

        
        if($id > 0){
            $model = EscolaMagiaModel::find($id);
        } else {
            $model = new EscolaMagiaModel();
        }

        if ($request->getMethod() == "POST")
        {
            $model->nome = $request->nome;
            $model->descricao = $request->descricao;

            if ($model->save()){
                return redirect("escolamagia")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("_escolamagia.form", [
                "model" => $model
            ]);
        }
    }
}
