<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comodo extends Model
{
    protected $primaryKey = 'idComodo';

    protected $fillable = [
        'nomeComodo'
    ];
}
