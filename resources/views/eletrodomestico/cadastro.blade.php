@extends('layouts.app')

@section('content')
<div class="container">
    @if(Auth::User()->administrador == 1)
    <form class="form" method="POST" action="{{url('eletrodomestico/insert')}}">
        <div class="form-group row">
            <div class="col-sm-2 col-form-label" id="lblNomeEletrodomestico">Eletrodoméstico :</div>
            <div class="col-sm-4">
                <input type="text" name="nomeEletrodomestico" id="nomeEletrodomestico" maxlength="45" class="form-control" @if(isset($eletro->nomeEletrodomestico)) value="{{$eletro->nomeEletrodomestico}}" @endif required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2 col-form-label" id="lblNomeEletrodomestico">Voltagem :</div>
            <div class="col-sm-4">
                <input type="text" name="voltagemEletrodomestico" maxlength="10" id="voltagemEletrodomestico" class="form-control" @if(isset($eletro->voltagemEletrodomestico)) value="{{$eletro->voltagemEletrodomestico}}" @endif required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2 col-form-label" id="lblidArduino">Caracter Identificador:</div>
            <div class="col-sm-2">
                <input type="text" name="idArduino" maxlength="1" id="idArduino" class="form-control" @if(isset($eletro->idArduino)) value="{{$eletro->idArduino}}" @endif>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Comodo :</label>
            <div class="col-sm-4">
                <select name="idComodo" class="form-control">
                    @foreach ( $comodos as $com )
                        <option value="{{ $com->idComodo }}" @if(isset($eletro->idComodo) && $eletro->idComodo ==  $com->idComodo) selected="selected" @endif>{{ $com->nomeComodo }}</option>
                    @endforeach 
                </select>
            </div>
        </div>
        <input type="hidden" name="idEletrodomestico" id="idEletrodomestico" class="form-control" @if(isset($eletro->idEletrodomestico)) value="{{$eletro->idEletrodomestico}}" @endif>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <input type="submit" class="btn btn-primary" value="@if(isset($eletro->idEletrodomestico)) Editar  @else Cadastrar @endif"/>
    </form>
    @else
        <div class="row justify-content-center">
            <p>Você não possui permissão para acessar esta página.</p>
        </div>
    @endif
</div>
@endsection
