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

		{!! Form::open(['url' => route('patrimonios.store')]) !!}
			<div class="col-md-6">
				<div class="form-group">
					{{Form::label('patrimonio', 'Patrimônio')}}
					{{Form::text('patrimonio','',
								['class' => 'form-control','placeholder' => 'Nome para o patrimônio']
								)}}
				</div>

				<div class="form-group">
					{{Form::label('plq_great', 'Plaqueta Great')}}
					{{Form::text('plq_great','',
								['class' => 'form-control','placeholder' => 'Plaqueta Great']
								)}}
				</div>

				<div class="form-group">
					{{Form::label('plq_ufc', 'Plaqueta UFC')}}
					{{Form::text('plq_ufc','',
								['class' => 'form-control','placeholder' => 'Plaqueta UFC']
								)}}
				</div>

				<div class="form-group">
					{{Form::label('plq_fcpc', 'Plaqueta FCPC')}}
					{{Form::text('plq_fcpc','',
								['class' => 'form-control','placeholder' => 'Plaqueta FCPC']
								)}}
				</div>

				<div class="form-group">
					{{Form::label('plq_dc', 'Plaqueta DC')}}
					{{Form::text('plq_dc','',
								['class' => 'form-control','placeholder' => 'Plaqueta DC']
								)}}
				</div>

				<div class="form-group">
					{{Form::label('tipo_id', 'Tipo')}}
					{{Form::select('tipo_id',$selects['tipo'],'',['class' => 'form-control','placeholder' => 'Selecione o tipo'])}}
				</div>

			</div>

			<div class="col-md-6">
				<div class="form-group">
					{{Form::label('descricao', 'Descrição do Patrimônio')}}
					{{Form::textarea('descricao','',
								['class' => 'form-control','placeholder' => 'Descrição do Patrimônio','size' => '20x4']
								)}}
				</div>


				<div class="form-group">
					{{Form::label('local_id', 'Local')}}
					{{Form::select('local_id',$selects['local'],'',['class' => 'form-control','placeholder' => 'Selecione o local'])}}
				</div>

				<div class="form-group">
					{{Form::label('projeto_id', 'Projeto')}}
					{{Form::select('projeto_id',$selects['projeto'],'',['class' => 'form-control','placeholder' => 'Selecione o projeto'])}}
				</div>

				<div class="form-group">
					{{Form::label('status_uso', 'Status de Uso')}}
					{{Form::select('status_uso',['0'=>'Inservível','1'=>'Usável'],'',['class' => 'form-control','placeholder' => 'Selecione o status de uso'])}}
				</div>
				<hr>
				{{Form::submit('Cadastrar Patrimônio',['class'=> 'form-control btn btn-primary'])}}
			</div>
		{!! Form::close() !!}
	</div>
@endsection

