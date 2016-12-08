<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $table = 'emprestimos';

    public function patrimonio()
    {
    	return $this->belongsTo('App\Patrimonio');
    }

    public function local()
    {
    	return $this->belongsTo('App\Local');
    }
}
