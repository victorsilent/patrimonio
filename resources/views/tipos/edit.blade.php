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

    {!! Form::model($tipo, ['route' => ['tipos.update', $tipo->id], 'method' => 'put'])  !!}
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('tipo', 'Tipo')}}
          {{Form::text('tipo',null,
                ['class' => 'form-control','placeholder' => 'Nome para o tipo']
                )}}
        </div>
        <hr>
        {{Form::submit('Editar Tipo',['class'=> 'form-control btn btn-primary'])}}
      </div>
    {!! Form::close() !!}
  </div>
@endsection

