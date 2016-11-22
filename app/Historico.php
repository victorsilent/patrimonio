<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    


    public function patrimonio()
    {
    	return $this->belongsTo('App\Patrimonio');
    }

    public function origem()
    {
    	return $this->hasOne('App\Local');
    }

    public function destino()
    {
    	return $this->hasOne('App\Local');
    }
}
