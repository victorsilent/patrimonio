@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    Listagem de Patrimonios
                    <a class="btn btn-primary pull-right" href="{{route('patrimonios.create')}}">
                        Cadastrar Patrimonio
                    </a> 
                </h2>
                     
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Patrimonio</th>
                    <th>Local</th>
                    <th>Projeto</th>
                    <th>Status Empréstimo</th>
                    <th>Status Uso</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patrimonios as $patrimonio)
                    <tr>
                        <td>
                            <a href="{{route('patrimonios.show',$patrimonio->id)}}">
                                {{$patrimonio->patrimonio}}
                            </a>
                        </td>
                        <td>{{$patrimonio->local->local}}</td>
                        <td>{{$patrimonio->projeto->projeto}}</td>
                        <td>
                            @if($patrimonio->status_emprestimo && $patrimonio->status_uso )
                                Emprestado
                            @else
                                <a href="{{route('patrimonios.emprestimos.create', $patrimonio->id)}}">
                                    Disponível
                                </a>                            
                            @endif
                        </td>
                        <td>
                            @if($patrimonio->status_uso)
                                Usável
                            @else
                                Inservível
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

</div>
@endsection
