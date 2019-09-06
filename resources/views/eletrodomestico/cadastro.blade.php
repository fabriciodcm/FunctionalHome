@extends('layouts.app')

@section('content')
<div class="container">
    <form class="form" method="POST" action="{{url('eletrodomestico/insert')}}">
        <div class="form-group row">
            <div class="col-sm-2 col-form-label" id="lblNomeEletrodomestico">Eletrodoméstico :</div>
            <div class="col-sm-4">
                <input type="text" name="nomeEletrodomestico" id="nomeEletrodomestico" class="form-control" @if(isset($eletro->nomeEletrodomestico)) value="{{$eletro->nomeEletrodomestico}}" @endif required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2 col-form-label" id="lblNomeEletrodomestico">Voltagem :</div>
            <div class="col-sm-4">
                <input type="text" name="voltagemEletrodomestico" id="voltagemEletrodomestico" class="form-control" @if(isset($eletro->voltagemEletrodomestico)) value="{{$eletro->voltagemEletrodomestico}}" @endif required>
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
        <input type="submit" class="btn btn-primary" value="Cadastrar"/>
    </form>
</div>
@endsection
