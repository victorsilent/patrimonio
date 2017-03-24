<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $table = 'emprestimos';
    protected $fillable = [
      'solicitante',
      'email_solicitante',
      'data_prevista',
      'data_emprestimo',
      'data_devolucao',
      'patrimonio_id',
      'local_id',

    ];

    public function patrimonio()
    {
    	return $this->belongsTo('App\Patrimonio');
    }

    public function local()
    {
    	return $this->belongsTo('App\Local');
    }
}
