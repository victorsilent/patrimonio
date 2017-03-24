<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Patrimonio;
use App\Local;
class Historico extends Model
{
    
	protected $table = 'historicos';
    protected $fillable = [
        'data_movimentacao',
        'destino_id',
        'origem_id',
        'patrimonio_id'
    ];

    public function patrimonio()
    {
    	return $this->belongsTo('App\Patrimonio');
    }

    public function origem()
    {
    	return $this->belongsTo('App\Local','origem_id');
    }

    public function destino()
    {
        return $this->belongsTo('App\Local','destino_id');
    }


}
