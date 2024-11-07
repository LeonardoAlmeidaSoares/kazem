<?php

namespace App\Http\Controllers;

use App\Models\ProficienciaModel;
use Illuminate\Http\Request;

class ProficienciaController extends Controller
{
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        //Listo todas as raçãs cadastradas
        $model =  ProficienciaModel::all(); 

        return view("index", [
            "titulo" => "Proficiencia",
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {
        if($id > 0){
            $model = ProficienciaModel::find($id);
        } else {
            $model = new ProficienciaModel();
        }

        if ($request->getMethod() == "POST")
        {
            $model->nome = $request->nome;
            $model->descricao = $request->descricao;

            if ($model->save()){
                return redirect("proficiencia")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("form", [
                "titulo" => "Proficiencias",
                "model" => $model
            ]);
        }
    }
}
