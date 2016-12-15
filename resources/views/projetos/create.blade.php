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

    {!! Form::open(['url' => route('projetos.store')]) !!}
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('projeto', 'Projeto')}}
          {{Form::text('projeto','',
                ['class' => 'form-control','placeholder' => 'Nome para o projeto']
                )}}
        </div>
        <hr>
        {{Form::submit('Cadastrar Projeto',['class'=> 'form-control btn btn-primary'])}}
      </div>
    {!! Form::close() !!}
  </div>
@endsection

