<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
	protected $table = 'locais';

    public function patrimonio()
    {
    	return $this->belongsTo('App\Patrimonio');
    }

    public function historico()
    {
    	return $this->belongsTo('App\Historico');
    }
}
