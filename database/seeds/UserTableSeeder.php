<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Fabricio Docema de Oliveira',
            'email' => 'fa.docema@gmail.com',
            'password' => Hash::make('123456'),
            'cpf' => '41563650851',
            'administrador' => true,
            'solicitacaoAceita' => true,
            'telefone'=> '11 9595-11122',
            'api_token' => '25111991130716',
        ]);
    }
}
