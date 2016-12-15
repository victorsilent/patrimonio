@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
            <div class="col-md-12">
                <h2>
                    Listagem de Projetos
                    <a class="btn btn-primary pull-right" href="{{route('projetos.create')}}">
                        Cadastrar Projeto
                    </a> 
                </h2>
                     
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Projeto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projetos as $projeto)
                    <tr>
                      <td>
                        <a href="{{route('projetos.show',$projeto->id)}}">
                          {{$projeto->projeto}}
                        </a>
                      </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
  </div>
</div>

@endsection
