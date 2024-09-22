<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AntecedenteModel;

class AntecedenteController extends Controller
{
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        //Listo todas as raçãs cadastradas
        $model =  AntecedenteModel::all(); 

        return view("index", [
            "titulo" => "Antecedentes",
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {
        
        if($id > 0){
            $model = AntecedenteModel::find($id);
        } else {
            $model = new AntecedenteModel();
        }

        if ($request->getMethod() == "POST")
        {
            $model->titulo = $request->titulo;
            $model->descricao = $request->descricao;

            if ($model->save()){
                return redirect("antecedente")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("form", [
                "titulo" => "Antecedentes",
                "model" => $model
            ]);
        }
    }
}
