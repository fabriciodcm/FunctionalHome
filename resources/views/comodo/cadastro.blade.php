@extends('layouts.app')

@section('content')
<div class="container">
    @if(Auth::User()->administrador == 1)
    <form class="form" method="POST" action="{{url('comodo/insert')}}">
        <div class="form-group row">
            <div class="col-sm-1 col-form-label" id="lblNomeComodo">Comodo :</div>
            <div class="col-sm-3">
                <input type="text" name="nomeComodo" id="nomeComodo" class="form-control" @if(isset($comodo->nomeComodo)) value="{{$comodo->nomeComodo}}" @endif required>
            </div>
        <input type="hidden" name="idComodo" id="idComodo" class="form-control" @if(isset($comodo->idComodo)) value="{{$comodo->idComodo}}" @endif>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <input type="submit" class="btn btn-primary" value="Cadastrar"/>
    </form>
    @else
        <div class="row justify-content-center">
            <p>Você não possui permissão para acessar esta página.</p>
        </div>
    @endif
</div>
@endsection
