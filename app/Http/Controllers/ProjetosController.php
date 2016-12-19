<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
use App\Patrimonio;
use Validator;
use Illuminate\Validation\Rule;

class ProjetosController extends Controller
{


    public function index()
    {
        
        $projetos = Projeto::paginate(10);
        return view('projetos.index')->with('projetos', $projetos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("projetos.create");
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
            'projeto' => 'required|unique:projetos|max:120',
        ]);

        if ($validator->fails()) {
            return redirect('projetos/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $projeto = $request->all();
        Projeto::create($projeto);
        return redirect('projetos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Projeto $projeto)
    {
        $patrimonios = Patrimonio::with('projeto')->where('projeto_id',$projeto->id)->paginate(10);
        return view('projetos.show')->with('patrimonios',$patrimonios)->with('projeto',$projeto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Projeto $projeto)
    {
        return view("projetos.edit")->with("projeto",$projeto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projeto $projeto)
    {
        $validator = Validator::make($request->all(), [
            'projeto' => ['required',Rule::unique('projetos')->ignore($projeto->id),'max:120'],
        ]);

        if ($validator->fails()) {
            return redirect('projetos/'.$projeto->id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $projeto->update($request->all());
        return redirect('projetos/'.$projeto->id);
    }

}
