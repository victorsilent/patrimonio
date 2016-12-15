<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patrimonio;
use App\Tipo;
use App\Local;
use App\Projeto;
use App\Historico;
use Validator;

class PatrimonioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patrimonios = Patrimonio::with('local','tipo','projeto')->get();

        return view('patrimonios.index')->with('patrimonios',$patrimonios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $selects['tipo'] = Tipo::all()->pluck('tipo','id');
        $selects['projeto'] = Projeto::all()->pluck('projeto','id');
        $selects['local'] = Local::all()->pluck('local','id');
        return view('patrimonios.create',compact('selects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patrimonio' => 'required|unique:patrimonios|max:60',
            'tipo_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('patrimonios/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $patrimonio = $request->all();
        $patrimonio['status_emprestimo'] = false;
        Patrimonio::create($patrimonio);
        return redirect('patrimonios');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patrimonio = Patrimonio::findOrFail($id);
        $movimentacoes = Historico::where('patrimonio_id',$id)->with('origem','destino')->get();
        return view('patrimonios.show')->with([
            'patrimonio' => $patrimonio,
            'movimentacoes' => $movimentacoes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patrimonio = Patrimonio::findOrFail($id);
        $selects['tipo'] = Tipo::all()->pluck('tipo','id');
        $selects['projeto'] = Projeto::all()->pluck('projeto','id');
        $selects['local'] = Local::all()->pluck('local','id');
        return view('patrimonios.edit')->with([
            'patrimonio' => $patrimonio,
            'selects' => $selects,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('patrimonios/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $patrimonio = $request->all();
        $patrimonio['status_emprestimo'] = false;
        Patrimonio::update($patrimonio);
        return redirect('patrimonios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
