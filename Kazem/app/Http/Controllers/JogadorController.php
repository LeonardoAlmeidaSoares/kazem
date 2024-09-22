<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JogadorModel;

class JogadorController extends Controller
{
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        //Listo todas os cadastradas
        $model =  JogadorModel::all(); 

        return view("index", [
            "titulo" => "Jogadores",
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {

        
        if($id > 0){
            $model = JogadorModel::find($id);
        } else {
            $model = new JogadorModel();
        }

        if ($request->getMethod() == "POST")
        {
            $model->nome = $request->nome;
            $model->status = $request->status;

            if ($model->save()){
                return redirect("jogador")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("_jogadores.form", [
                "model" => $model
            ]);
        }
    }
}
