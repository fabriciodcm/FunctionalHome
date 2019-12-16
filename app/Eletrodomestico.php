<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eletrodomestico extends Model
{
    protected $primaryKey = 'idEletrodomestico';

    protected $fillable = [
        'nomeEletrodomestico, voltagemEletrodomestico' , 'idComodo', 'idArduino'
    ];
}
