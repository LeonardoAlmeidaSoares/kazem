<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CidadeModel;
use App\Models\ContinenteModel;

class CidadeController extends Controller
{
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        //Listo todas as raçãs cadastradas
        $model =  CidadeModel::all(); 

        return view("_cidade.index", [
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {
        
        if($id > 0){
            $model = CidadeModel::find($id);
        } else {
            $model = new CidadeModel();
        }

        $continentes = ContinenteModel::all();

        if ($request->getMethod() == "POST")
        {
            $model->nome = $request->nome;
            $model->id_continente = $request->id_continente;
            $model->descricao = $request->descricao;

            if ($model->save()){
                return redirect("cidade")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("_cidade.form", [
                "model" => $model,
                "continentes" => $continentes
            ]);
        }
    }
}
