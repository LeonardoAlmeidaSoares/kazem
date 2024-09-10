<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\RacaModel;

class RacaController extends Controller
{
    function __construct()
    {
        session_start();
    }

    public function index(Request $request)
    {

        //Listo todas as raçãs cadastradas
        $model =  RacaModel::all(); 

        return view("_racas.index", [
            "model" => $model
        ]);
    }

    public function form(Request $request, $id = 0)
    {

        
        if($id > 0){
            $model = RacaModel::find($id);
        } else {
            $model = new RacaModel();
        }

        if ($request->getMethod() == "POST")
        {
            $model->titulo = $request->titulo;

            if ($model->save()){
                return redirect("raca")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("_racas.form", [
                "model" => $model
            ]);
        }
    }
}
