<?php

namespace App\Http\Controllers;

use App\Models\EquipamentoModel;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        $model =  EquipamentoModel::all(); 

        return view("_equipamento.index", [
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {
        
        if($id > 0){
            $model = EquipamentoModel::find($id);
        } else {
            $model = new EquipamentoModel();
        }

        if ($request->getMethod() == "POST")
        {

            $model->nome = $request->nome;
            $model->valor = $request->valor;
            $model->unidade = $request->unidade;
            $model->descricao = $request->descricao;
            $model->peso = $request->peso;
            
            if ($model->save()){
                return redirect("equipamento")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("_equipamento.form", [
                "model" => $model
            ]);
        }
    }
}
