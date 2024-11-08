<?php

namespace App\Http\Controllers;

use App\Models\DivindadeModel;
use Illuminate\Http\Request;

class DivindadeController extends Controller
{
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        $model =  DivindadeModel::all(); 

        return view("index", [
            "titulo" => "Divindades",
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {
        
        if($id > 0){
            $model = DivindadeModel::find($id);
        } else {
            $model = new DivindadeModel();
        }

        if ($request->getMethod() == "POST")
        {

            $model->nome = $request->nome;
            $model->alcunha = $request->alcunha;
            $model->alinhamento = $request->alinhamento;
            $model->dominios = $request->dominios;
            $model->posto = $request->posto;
            $model->arma_predileta = $request->arma_predileta;
            $model->aspecto = $request->aspecto;
            $model->descricao = $request->descricao;
            
            if ($model->save()){
                return redirect("divindade")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("form", [
                "titulo" => "Divindades",
                "model" => $model
            ]);
        }
    }
}
