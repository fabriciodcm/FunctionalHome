<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comodo;
use App\Lampada;

class LampadaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function cadLampada()
    {
        $comodos = Comodo::all();
        if($comodos->isEmpty()){
            //se não houver comodos será necessário cadastrar primeiro
            return view('comodo/cadastro');
        }
        return view('lampada/cadastro', compact('comodos'));
    }

    public function getLampadas()
    {
        $lampadas =  Lampada::all();
        return view('lampada/listar', compact( 'lampadas'));
    }
    
    public function getLampada($id){
        $lampada = Lampada::find($id);
        $comodos = Comodo::all();
        return view('lampada/cadastro', compact( 'lampada','comodos'));
    }

    public function insert(Request $request){
        
        if(isset($request->idLampada)){
            //update
            $lampada = Lampada::find($request->input('idLampada'));
        }else{
            //insert
            $lampada = new Lampada();
        }

        $lampada->idComodo = $request->input('idComodo');
        $lampada->nomeLampada = $request->input('nomeLampada');
        $lampada->voltagemLampada = $request->input('voltagemLampada');
        $lampada->save();
        return redirect('/lampada/listar');
    }

    public function delete($id){
        $lampada = Lampada::find($id);
        $lampada->delete();
        return redirect('/lampada/listar');
    }
}
