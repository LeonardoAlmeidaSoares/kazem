<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TalentoModel;

class TalentoController extends Controller
{
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        //Listo todas as raçãs cadastradas
        $model =  TalentoModel::all(); 

        return view("index", [
            "titulo" => "Talentos",
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {
        if($id > 0){
            $model = TalentoModel::find($id);
        } else {
            $model = new TalentoModel();
        }

        if ($request->getMethod() == "POST")
        {
            $model->nome = ucwords(strtolower($request->nome));
            $model->pre_requisito = $request->pre_requisito;
            $model->descricao = $request->descricao;
            
            if ($model->save()){
                return redirect("talento")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("_talento.form", [
                "model" => $model
            ]);
        }
    }
}
