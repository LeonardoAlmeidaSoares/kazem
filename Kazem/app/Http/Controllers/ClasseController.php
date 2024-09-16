<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ClasseModel;

class ClasseController extends Controller
{
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        //Listo todas as raçãs cadastradas
        $model =  ClasseModel::all(); 

        return view("_classe.index", [
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {
        
        if($id > 0){
            $model = ClasseModel::find($id);
        } else {
            $model = new ClasseModel();
        }

        if ($request->getMethod() == "POST")
        {
            $model->nome = $request->nome;
            $model->somente_npc = $request->somente_npc;
            $model->descricao = $request->descricao;
            $model->dado_vida = $request->dado_vida;

            if ($model->save()){
                return redirect("classe")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("_classe.form", [
                "model" => $model
            ]);
        }
    }
}
