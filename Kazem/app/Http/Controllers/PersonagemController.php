<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PersonagemModel;

class PersonagemController extends Controller
{
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        //Listo todas as raçãs cadastradas
        $model =  PersonagemModel::all(); 

        return view("_personagem.index", [
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {

        
        if($id > 0){
            $model = PersonagemModel::find($id);
        } else {
            $model = new PersonagemModel();
        }

        if ($request->getMethod() == "POST")
        {
            $model->titulo = $request->titulo;

            if ($model->save()){
                return redirect("personagem")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("_personagem.form", [
                "model" => $model
            ]);
        }
    }

    public function ficha(Request $request, $id=0)
    {
        return view("_personagem.ficha", [
            
        ]);
    }
}
