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

    {!! Form::model($local, ['route' => ['locais.update', $local->id], 'method' => 'put'])  !!}
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('local', 'Local')}}
          {{Form::text('local',null,
                ['class' => 'form-control','placeholder' => 'Nome para o local']
                )}}
        </div>
        <hr>
        {{Form::submit('Editar Local',['class'=> 'form-control btn btn-primary'])}}
      </div>
    {!! Form::close() !!}
  </div>
@endsection

