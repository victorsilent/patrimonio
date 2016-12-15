<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Local;
use App\Patrimonio;
use Validator;

class LocaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locais = Local::all();
        return view('locais.index')->with('locais',$locais);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locais.create');
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
            'local' => 'required|unique:locais|max:60',
        ]);

        if ($validator->fails()) {
            return redirect('locais/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Local::create($request->all());
        return redirect('locais');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //TODO Ver porque com Local $local não esta dando certo
        $local = Local::findOrFail($id);
        $patrimonios = Patrimonio::with('local')->where('local_id',$local->id)->get();
        
        return view('locais.show')->with('local',$local)->with('patrimonios',$patrimonios);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $local = Local::findOrFail($id);
        return view('locais.edit')->with('local',$local);
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
        $validator = Validator::make($request->all(), [
            'local' => 'required|unique:locais|max:60',
        ]);

        if ($validator->fails()) {
            return redirect('locais/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $local = Local::findOrFail($id);
        $local->update($request->all());
        return redirect('locais');
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
