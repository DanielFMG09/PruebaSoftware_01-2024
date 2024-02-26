<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Consulta para mostrar los datos en la tabla y grafica
        $datos=DB::select("SELECT * FROM control_temperatura");
        return view('home')->with("datos",$datos);

 
        
    }
    public function create(Request $request){
        //Añadir un nuevo registro
        // Obtener la última fecha almacenada en la base de datos
        $ultima_fecha = DB::select("SELECT MAX(fecha_registro) AS ultima_fecha FROM control_temperatura");
        if (!empty($ultima_fecha)) {
            $ultima_fecha = $ultima_fecha[0]->ultima_fecha;
            // Calcular la siguiente fecha consecutiva
            $siguiente_fecha = date('Y-m-d', strtotime("$ultima_fecha + 1 day"));
        } else {
            // Si no hay ninguna fecha almacenada en la base de datos, usar la fecha actual
            $siguiente_fecha = date('Y-m-d');
        }
        try{
            //Generador de numero alearotio de 24.0 a 29.9
            $temperatura = rand(240, 299) / 10;
            $fecha_registro = $siguiente_fecha; 
            $sql = DB::insert("INSERT INTO control_temperatura (fecha_registro, temperatura) VALUES (?, ?)", [
                $fecha_registro, 
                $temperatura    
            ]);
        }catch(\Throwable $th){
            $sql= 0;
        }

        if($sql==true){
            return  back()->with("correcto", "Termperatura registrada");
        }else{
            return  back()->with("incorrecto", "Error al registrar");
        }
    }
}



