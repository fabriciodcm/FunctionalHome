<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lampada extends Model
{
    protected $primaryKey = 'idLampada';

    protected $fillable = [
        'nomeLampada, voltagemLampada' , 'idComodo'
    ];
}
