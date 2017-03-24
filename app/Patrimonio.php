<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;
use App\Historico;

class Patrimonio extends Model
{
    // use Searchable;
    
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


    public function emprestar($novo_local)
    {
        if($this->status_emprestimo == 0){

            $data_movimentacao = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
            $local_destino = $novo_local;
            $create = $this->historico()->create([
                'data_movimentacao' => $data_movimentacao,
                'destino_id' => $local_destino,
                'origem_id' => $this->local_id,
            ]);

            if($create){
                $this->status_emprestimo = 1;
                $this->save();
                return true;
            }
        }
        return false;
    }
    public function devolver($local_atual)
    {
        if($this->status_emprestimo == 1){
            $data_movimentacao = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
            $create = $this->historico()->create([
                'data_movimentacao' => $data_movimentacao,
                'destino_id' => $this->local->id,
                'origem_id' => $local_atual,
            ]);
            if($create){
                $this->status_emprestimo = 0;
                $this->save();
                return true;
            }
        }
        return false;
    }
    /**
     * Get the index name for the model.
     *
     * @return string
     */
    // public function searchableAs()
    // {
    //     return 'patrimonios_index';
    // }

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
