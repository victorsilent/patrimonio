<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Patrimonio;
use App\Tipo;

class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Tipo::all();
        return view('tipos.index')->with('tipos', $tipos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos.create');
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
            'tipo' => 'required|unique:tipos|max:120',
        ]);

        if ($validator->fails()) {
            return redirect('tipos/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $tipo = $request->all();
        Tipo::create($tipo);
        return redirect('tipos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo $tipo)
    {
        $patrimonios = Patrimonio::where('tipo_id',$tipo->id)->get();
        return view('tipos.show')->with('tipo', $tipo)->with('patrimonios',$patrimonios);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo $tipo)
    {
        return view('tipos.edit')->with('tipo', $tipo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipo $tipo)
    {
        $validator = Validator::make($request->all(), [
            'tipo' => 'required|unique:tipos|max:120',
        ]);

        if ($validator->fails()) {
            return redirect('tipos/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        
        $tipo->update($request->all());
        return redirect('tipos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
