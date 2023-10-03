<?php

namespace App\Http\Controllers\vaga;

use App\Http\Controllers\Controller;
use App\Models\vaga\Vaga;
use Illuminate\Http\Request;

class VagaController extends Controller
{
    public function showAll() {
        $jobs = Vaga::all(); 
        
        return view('Vaga.vagas', ["jobs" => $jobs]);
    }

    public function showApi() {
        $jobs = Vaga::all(); 
        
        return response()->json($jobs, 202);
    }
    
}
