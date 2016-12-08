<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
	protected $table = 'projetos';
	
    public function patrimonio()
    {
    	return $this->hasMany('App\Patrimonio');
    }
}
