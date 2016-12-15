@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
            <div class="col-md-12">
                <h2>
                    Listagem de Locais
                    <a class="btn btn-primary pull-right" href="{{route('locais.create')}}">
                        Cadastrar Local
                    </a> 
                </h2>
                     
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Local</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locais as $local)
                    <tr>
                      <td>
                        <a href="{{route('locais.show',$local->id)}}">
                          {{$local->local}}
                        </a>
                      </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
  </div>
</div>

@endsection
