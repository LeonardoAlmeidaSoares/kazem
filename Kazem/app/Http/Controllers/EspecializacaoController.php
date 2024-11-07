<?php

namespace App\Http\Controllers;

use App\Models\EspecializacaoModel;
use Illuminate\Http\Request;

class EspecializacaoController extends Controller
{
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        //Listo todas os cadastradas
        $model =  EspecializacaoModel::all(); 

        return view("index", [
            "titulo" => "Especializações",
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {

        
        if($id > 0){
            $model = EspecializacaoModel::find($id);
        } else {
            $model = new EspecializacaoModel();
        }

        if ($request->getMethod() == "POST")
        {
            $model->nome = $request->nome;
            $model->descricao = $request->descricao;
            $model->id_classe = $request->id_classe;

            if ($model->save()){
                return redirect("especializacao")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("form", [
                "titulo" => "Especializações",
                "model" => $model
            ]);
        }
    }
}
