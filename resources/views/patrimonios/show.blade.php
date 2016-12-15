@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 header-patrimonio">
            <h2>
                {{$patrimonio->patrimonio}}
                <a class="btn btn-primary pull-right" href="{{route('patrimonios.edit',$patrimonio->id)}}">
                    Editar
                </a>
                <a class="btn btn-success pull-right emprestar-button" href="">
                    Emprestar
                </a>
            </h2>
            <span class="label label-primary">UFC {{$patrimonio->plq_ufc}}</span>
            <span class="label label-danger">FCPC {{$patrimonio->plq_fcpc}}</span>
            <span class="label label-success">DC {{$patrimonio->plq_dc}}</span>
            <span class="label label-warning">GREAT {{$patrimonio->plq_great}}</span>
             
        </div>
              

    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Local</th>
                <th>Projeto</th>
                <th>Emprestado</th>
                <th>Usável</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{$patrimonio->tipo->tipo}}</td>
                    <td>{{$patrimonio->local->local}}</td>
                    <td>{{$patrimonio->projeto->projeto}}</td>
                    <td>
                        @if($patrimonio->status_emprestimo && $patrimonio->status_uso)
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
        </tbody>
    </table>
    
    <div id="historico-patrimonio">
        <h4>Histórico do Patrimônio</h4>
        
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Data da Movimentação</th>
                    <th>Local de Origem</th>
                    <th>Local de Destino</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($movimentacoes as $movimentacao)
                        <tr>
                            <td>{{$movimentacao->data_movimentacao}}</td>
                            <td>{{$movimentacao->origem->local}}</td>
                            <td>{{$movimentacao->destino->local}}</td>

                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
