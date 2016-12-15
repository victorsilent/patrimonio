<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
	protected $table = 'tipos';
	protected $fillable = [
		'tipo'
	];

    public function patrimonios()
    {
    	return $this->hasMany('App\Patrimonio');
    }
}
