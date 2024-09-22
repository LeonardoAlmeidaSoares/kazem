<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArmaModel;

class ArmaController extends Controller
{
    
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        //Listo todas as raçãs cadastradas
        $model =  ArmaModel::all(); 

        return view("index", [
            "titulo" => "Armas",
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {
        
        if($id > 0){
            $model = ArmaModel::find($id);
        } else {
            $model = new ArmaModel();
        }

        if ($request->getMethod() == "POST")
        {

            $model->nome = $request->nome;
            $model->tipo = $request->tipo;
            $model->unidade = $request->unidade;
            $model->valor = $request->valor;
            $model->dano = $request->dano;
            $model->propriedades = $request->propriedades;
            $model->peso = $request->peso;
            
            if ($model->save()){
                return redirect("arma")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("form", [
                "titulo" => "Armas",
                "model" => $model
            ]);
        }
    }
}
