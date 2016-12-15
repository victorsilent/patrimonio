<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Historico;
class Local extends Model
{
	protected $table = 'locais';
	protected $fillable = [
		'local'
	];

    public function patrimonios()
    {
    	return $this->hasMany('App\Patrimonio');
    }

    public function historicos()
    {
    	return $this->hasMany('App\Historico','origem_id');
    }

    public function emprestimos()
    {
    	return $this->hasMany('App\Emprestimo');
    }
}
