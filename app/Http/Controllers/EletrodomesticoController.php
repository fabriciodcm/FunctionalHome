<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function delete($id){
        if(Auth::User()->administrador == 1){
            $eletro = Eletrodomestico::find($id);
            $eletro->delete();
        }
        return redirect('/eletrodomestico/listar');
    }

    public function ligaDesliga(Request $request){
        $id = $request->input('id');
        //Pega a letra do banco e passa para o parâmetro
        $parametro = "a";
        
        $url_feed = "192.168.0.168?" . $parametro;
	 
	    // Inicia a sessão cURL
	    $ch = curl_init();
	 
	    // Informa a URL onde será enviada a requisição
	    curl_setopt($ch, CURLOPT_URL, $url_feed);
	 
	    // Se true retorna o conteúdo em forma de string para uma variável
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 
	    // Envia a requisição
	    $result = curl_exec($ch);
	 
	    // Finaliza a sessão
	    curl_close($ch);

	    //Capturando retorno do Arduino para redirecionar ao formulario
	    $retorno_arduino = explode("\n", $result);
	    $novo_parametro = "L=" . trim($retorno_arduino[0]) . "&M=" . trim($retorno_arduino[1]) . "&N=" . trim($retorno_arduino[2]);
        
        //header("Location: formulario.php?" . $novo_parametro);
        //retorna a requisicao para o ajax trata o checkbox
        return Response($novo_parametro,200);
    }
}
