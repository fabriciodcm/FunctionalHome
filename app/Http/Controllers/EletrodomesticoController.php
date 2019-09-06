<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comodo;
use App\Eletrodomestico;

class EletrodomesticoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function cadEletrodomestico()
    {
        $comodos = Comodo::all();
        if($comodos->isEmpty()){
            //se não houver comodos será necessário cadastrar primeiro
            return view('comodo/cadastro');
        }
        return view('eletrodomestico/cadastro', compact('comodos'));
    }

    public function getEletrodomesticos()
    {
        $eletros =  Eletrodomestico::all();
        return view('eletrodomestico/listar', compact( 'eletros'));
    }
    
    public function getEletrodomestico($id){
        $eletro = Eletrodomestico::find($id);
        $comodos = Comodo::all();
        return view('eletrodomestico/cadastro', compact( 'eletro','comodos'));
    }

    public function insert(Request $request){
        
        if(isset($request->idEletrodomestico)){
            //update
            $eletro = Eletrodomestico::find($request->input('idEletrodomestico'));
        }else{
            //insert
            $eletro = new Eletrodomestico();
        }

        $eletro->idComodo = $request->input('idComodo');
        $eletro->nomeEletrodomestico = $request->input('nomeEletrodomestico');
        $eletro->voltagemEletrodomestico = $request->input('voltagemEletrodomestico');
        $eletro->save();
        return redirect('/eletrodomestico/listar');
    }
}
