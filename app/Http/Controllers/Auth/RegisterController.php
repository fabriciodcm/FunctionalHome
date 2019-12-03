<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');//trocado de guest para auth para nao redirecionar apos o register
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cpf' => ['required', 'string', 'min:11', 'max:11'],
            'telefone' => ['required', 'string', 'min:11', 'max:20'],
        ]);
    }

    protected function validatorEdit(array $data, $id)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cpf' => ['required', 'string', 'min:11', 'max:11'],
            'telefone' => ['required', 'string', 'min:11', 'max:20'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'api_token' => User::geraToken(),
            'cpf' => $data['cpf'],
            'telefone' => $data['telefone']
        ]);
    }

    protected function redirectTo()
    {
        return '/user/listar';
    }

    public function register(Request $request)
    {
        //Como desabilitar login automatico e redirecionamento após registrar usuário
        //https://laraveldaily.com/9-things-you-can-customize-in-laravel-registration/
        //https://stackoverflow.com/questions/43283708/enable-register-page-only-after-i-logged-in-laravel-5-4
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }


    public function getUser($id){
        $user = User::find($id);
        return view('auth/edit', compact( 'user'));
    }

    public function edit(Request $request)
    {
        $this->validatorEdit($request->all(),$request->id)->validate();

        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->api_token = User::geraToken();
        $user->cpf = $request->cpf;
        $user->telefone = $request->telefone;
        $user->save();
        return redirect($this->redirectPath());
    }
}
