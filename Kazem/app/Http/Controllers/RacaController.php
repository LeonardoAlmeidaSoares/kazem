<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\RacaModel;
use App\Models\RacaVarianteModel;

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

        return view("index", [
            "titulo" => "Raças",
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
            $model->deslocamento = $request->deslocamento;
            $model->descricao = $request->descricao;

            if ($model->save()){
                return redirect("raca")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("form", [
                "titulo" => "Raças",
                "model" => $model
            ]);
        }
    }

    public function variacao(Request $request, $id = 0)
    {
        //Listo todas as raçãs cadastradas
        $model =  RacaVarianteModel::where(["id_raca" => $id])->get(); 
        $modelPai = RacaModel::find($id);
        
        return view("index", [
            "titulo" => "Raças Variantes de " . $modelPai->titulo,
            "model" => $model
        ]);
    }

    public function varianteform(Request $request, $idRaca, $idVariante)
    {
        if($idVariante > 0){
            $model = RacaVarianteModel::find($idVariante);
        } else {
            $model = new RacaVarianteModel();
        }

        if ($request->getMethod() == "POST")
        {

            $raca = RacaModel::find($idRaca);

            $model->nome = $request->nome;
            $model->id_raca = $request->idRaca;

            if(isset($request->aproveitar_descricao))
                $model->descricao = $raca->descricao . "<br>" . $request->descricao;
            else
                $model->descricao = $request->descricao;
    
            if ($model->save()){
                return redirect("racavariante/$idRaca")->with("msg_sucesso", "Cadastro Realizado com Sucesso");
            } else {
                return back()->withInput();
            }
        }
        else
        {
            return view("form", [
                "titulo" => "Raças Variantes",
                "model" => $model
            ]);
        }
    }
}
