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
}
