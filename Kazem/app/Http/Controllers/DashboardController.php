<?php

namespace App\Http\Controllers;

use App\Models\PersonagemModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request)
    {

        $total_personagens = PersonagemModel::all();

        return view('dashboard', [
            "total_personagens" => $total_personagens->count()
        ]);
    }

    public function escudo(Request $request)
    {
        return view('dashboard-escudo', [
            
        ]);
    }
}
