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
                @if(!$patrimonio->status_emprestimo)
                    <a class="btn btn-success pull-right emprestar-button" href="{{route('patrimonios.emprestimos.create',$patrimonio->id)}}">
                        Emprestar
                    </a>
                @endif
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
                        @if($patrimonio->status_emprestimo)
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
                    <th>Email Solicitante</th>
                    <th>Nome Solicitante</th>
                    <th>Local de Movimentação</th>
                    <th>Status Emprestimo</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($emprestimos as $emprestimo)
                        <tr>
                            <td>
                            {{\Carbon\Carbon::parse($emprestimo->data_emprestimo)->format('d/m/Y')}}
                            </td>
                            <td>{{$emprestimo->email_solicitante}}</td>
                            <td>{{$emprestimo->solicitante}}</td>
                            <td>{{$emprestimo->local->local}}</td>
                            <td>

                                @if($emprestimo->data_devolucao == null)
                                    {!! Form::open(['method' => 'DELETE','url' => route('patrimonios.emprestimos.destroy',[$patrimonio->id,$emprestimo->id]),'onsubmit' => 'return confirm("Deseja mesmo confirmar o recebimento?")']) !!}
                                    {{Form::submit('Confirmar Devolução',['class'=> ' btn btn-danger'])}}
                                    {!! Form::close() !!}
                                @else
                                    {{$emprestimo->data_devolucao}}
                                @endif
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        <div class="center-link">
            {{ $emprestimos->links() }}
        </div>
    </div>
</div>
@endsection
