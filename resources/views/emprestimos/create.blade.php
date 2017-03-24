@extends('layouts.app')

@section('content')
  <div class="container">
      @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['url' => route('patrimonios.emprestimos.store',$patrimonio->id)]) !!}
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('solicitante', 'Solicitante')}}
          {{Form::text('solicitante','',
                ['class' => 'form-control','placeholder' => 'Nome do solicitante']
                )}}
        </div>

        <div class="form-group">
          {{Form::label('email_solicitante', 'Email')}}
          {{Form::text('email_solicitante','',
                ['class' => 'form-control','placeholder' => 'Email do solicitante']
                )}}
        </div>

        <div class="form-group">
          {{Form::label('data_prevista', 'Data Prevista de Devolução')}}
          {{Form::date('data_prevista',\Carbon\Carbon::now()->format('d/m/Y'),['class' => 'form-control', 'id' =>'datepicker' ])}}
        </div>

        <div class="form-group">
          {{Form::label('local_id', 'Locais')}}
          {{Form::select('local_id',$locais,'',['class' => 'form-control','placeholder' => 'Selecione o local'])}}
        </div>
        <hr>
        {{Form::submit('Emprestar Patrimônio',['class'=> 'form-control btn btn-primary'])}}
      </div>
    {!! Form::close() !!}
  </div>
@endsection



