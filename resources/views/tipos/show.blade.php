@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>
                Tipo: {{$tipo->tipo}}
                <a class="btn btn-primary pull-right" href="{{route('tipos.edit',$tipo->id)}}">
                    Editar Tipo
                </a> 
            </h2>
                 
        </div>
    </div>
    <hr>
    <h3>Patrimônios relacionados a este tipo</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Patrimônio</th>
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
                            Disponível
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
