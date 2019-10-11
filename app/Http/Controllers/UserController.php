<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    //

    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        if(empty($email) || empty($password) ){
            //faltando parametro 422
            return Response("0",422);
        }
        else{            
            if(\Auth::attempt(['email' => $email, 'password' => $password])){
                //sucesso no login
                $user = \Auth::user();
                return Response()->json($user);
            }else{
                //usuario nao encontrado
                return Response("0",401);
            }
        }     
    }

    public function setAceite(Request $request){
        $status = $request->input('status');
        $id = $request->input('id');
        $user = User::find($id);
        $user->solicitacaoAceita = $status == 'true' ? 1 : 0;
        $user->save();
    }

    public function setAdmin(Request $request){
        $status = $request->input('status');
        $id = $request->input('id');
        $user = User::find($id);
        $user->administrador = $status == 'true' ? 1 : 0;
        $user->save();
    }

    public function getUsers(){
        $users =  User::all();
        return view('user/listar', compact( 'users'));
    }

    public function delete($id){
        if(Auth::User()->administrador == 1){
            $user = User::find($id);
            $user->delete();
        }
        return redirect('user/listar');
    }

}
