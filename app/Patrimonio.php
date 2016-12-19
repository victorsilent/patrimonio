<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Patrimonio extends Model
{
    use Searchable;
    
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

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'patrimonios_index';
    }

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
