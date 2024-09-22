<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdiomaModel;

class IdiomaController extends Controller
{
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        //Listo todas as raçãs cadastradas
        $model =  IdiomaModel::all(); 

        return view("index", [
            "titulo" => "Idiomas",
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {
        if($id > 0){
            $model = IdiomaModel::find($id);
        } else {
            $model = new IdiomaModel();
        }

        if ($request->getMethod() == "POST")
        {
            $model->nome = ucwords(strtolower($request->nome));
            $model->descricao = $request->descricao;
            
            if ($model->save()){
                return redirect("idioma")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("_idioma.form", [
                "model" => $model
            ]);
        }
    }
}
