<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patrimonio extends Model
{
    


    public function tipo()
    {
    	return $this->hasOne('App\Tipo');
    }

    public function local()
    {
    	return $this->hasOne('App\Local');
    }

    public function projeto()
    {
    	return $this->hasOne('App\Projeto');
    }

    public function historico()
    {
    	return $this->hasOne('App\Historico');
    }
}
