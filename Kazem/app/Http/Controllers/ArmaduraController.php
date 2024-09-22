<?php

namespace App\Http\Controllers;

use App\Models\ArmaduraModel;
use Illuminate\Http\Request;

class ArmaduraController extends Controller
{
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        //Listo todas as raçãs cadastradas
        $model =  ArmaduraModel::all(); 

        return view("index", [
            "titulo" => "Armaduras",
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {
        
        if($id > 0){
            $model = ArmaduraModel::find($id);
        } else {
            $model = new ArmaduraModel();
        }

        if ($request->getMethod() == "POST")
        {

            $model->nome = $request->nome;
            $model->valor = $request->valor;
            $model->unidade = $request->unidade;
            $model->ca = $request->ca;
            $model->forca_necessaria = $request->forca_necessaria;
            $model->desv_furtividade = isset($request->desv_furtividade)?"S":"N";
            $model->peso = $request->peso;
            
            if ($model->save()){
                return redirect("armadura")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("form", [
                "titulo" => "Armaduras",
                "model" => $model
            ]);
        }
    }
}
