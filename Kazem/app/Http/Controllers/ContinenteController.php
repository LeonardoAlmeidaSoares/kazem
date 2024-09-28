<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContinenteModel;

class ContinenteController extends Controller
{
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        //Listo todas os cadastradas
        $model =  ContinenteModel::all(); 

        return view("index", [
            "titulo" => "Continentes",
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {

        
        if($id > 0){
            $model = ContinenteModel::find($id);
        } else {
            $model = new ContinenteModel();
        }

        if ($request->getMethod() == "POST")
        {
            $model->nome = $request->nome;
            $model->descricao = $request->descricao;

            if ($model->save()){
                return redirect("continente")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("form", [
                "titulo" => "Continentes",
                "model" => $model
            ]);
        }
    }
}
