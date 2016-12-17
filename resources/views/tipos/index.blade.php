@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
            <div class="col-md-12">
                <h2>
                    Listagem de Tipos
                    <a class="btn btn-primary pull-right" href="{{route('tipos.create')}}">
                        Cadastrar Tipo
                    </a> 
                </h2>
                     
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tipos as $tipo)
                    <tr>
                      <td>
                        <a href="{{route('tipos.show',$tipo->id)}}">
                          {{$tipo->tipo}}
                        </a>
                      </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="center-link">
            {{ $tipos->links() }}
        </div>
  </div>
</div>

@endsection
