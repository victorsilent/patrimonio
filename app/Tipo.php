<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
	protected $table = 'tipos';
    public function patrimonio()
    {
    	return $this->belongsTo('App\Patrimonio');
    }
}
