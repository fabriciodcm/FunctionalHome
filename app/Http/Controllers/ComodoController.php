<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comodo;

class ComodoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function cadComodo()
    {
        return view('comodo/cadastro');
    }

    public function getComodos()
    {
        $comodos =  Comodo::all();
        return view('comodo/listar', compact( 'comodos'));
    }
    
    public function getComodo($id){
        $comodo = Comodo::find($id);
        return view('comodo/cadastro', compact( 'comodo'));
    }

    public function insert(Request $request){
        
        if(isset($request->idComodo)){
            //update
            $comodo = Comodo::find($request->input('idComodo'));
        }else{
            //insert
            $comodo = new Comodo();
        }
        $comodo->nomeComodo = $request->nomeComodo;
        $comodo->save();
        return redirect('/comodo/listar');
    }

    public function delete($id){
        $comodo = Comodo::find($id);
        $comodo->delete();
        return redirect('/comodo/listar');
    }
}
