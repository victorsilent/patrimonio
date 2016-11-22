<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    public function patrimonio()
    {
    	return $this->belongsTo('App\Patrimonio');
    }
}
