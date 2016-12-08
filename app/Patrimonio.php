<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patrimonio extends Model
{
    
    protected $fillable = [
        'patrimonio', 
        'tipo_id', 
        'status_uso', 
        'status_emprestimo', 
        'descricao',
        'local_id',
        'projeto_id',
        'plq_ufc',
        'plq_great',
        'plq_fcpc',
        'plq_dc',
    ];

    

	protected $table = 'patrimonios';

    public function tipo()
    {
    	return $this->belongsTo('App\Tipo');
    }

    public function local()
    {
    	return $this->belongsTo('App\Local');
    }

    public function projeto()
    {
    	return $this->belongsTo('App\Projeto');
    }

    public function historico()
    {
    	return $this->hasOne('App\Historico');
    }

    public function emprestimo()
    {
    	return $this->hasOne('App\Emprestimo');
    }
}
