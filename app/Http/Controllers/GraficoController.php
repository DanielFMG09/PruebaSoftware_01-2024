<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControlTemperatura;

class GraficoController extends Controller
{
    public function index()
    {
        
        $datosGrafico = ControlTemperatura::all();
        
        return view('grafico', compact('datosGrafico'));
        
        
    }
}