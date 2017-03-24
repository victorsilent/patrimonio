<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Local;
use App\Patrimonio;
use App\Emprestimo;
use Validator;

class EmprestimoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Patrimonio $patrimonio)
    {
        $locais = Local::all()->pluck('local','id');
        return view("emprestimos.create")->with('locais',$locais)->with('patrimonio',$patrimonio);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Patrimonio $patrimonio)
    {
        if($patrimonio->status_emprestimo){
            return redirect()->back()
                        ->withErrors('Patrimonio ja possui um emprestimo...');
        }
        $emprestimo = new Emprestimo($request->all());
        $emprestimo->patrimonio_id = $patrimonio->id;
        //$emprestimo = $request->all();]
        $emprestimo->data_devolucao = null;
        $emprestimo->data_prevista = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('data_prevista'))->format('Y-m-d H:i:s');
        $emprestimo->data_emprestimo = \Carbon\Carbon::now()->format('Y-m-d H:i:s');

        $validator = Validator::make($request->all(), [
            'solicitante' => 'required|max:120',
            'email_solicitante' => 'required|max:120',
            'data_prevista' => 'required',
            'local_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $emprestimo->save();
        $patrimonio->emprestar($emprestimo->local_id);

        return redirect("/patrimonios/".$patrimonio->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patrimonio $patrimonio, Emprestimo $emprestimo)
    {
        $patrimonio->devolver($emprestimo->local_id);
        $emprestimo->data_devolucao = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $emprestimo->save();
        return redirect('/patrimonios/'.$patrimonio->id);
    }
}
