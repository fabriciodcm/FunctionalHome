@extends('layouts.app')

@section('content')
<div class="container">
    @if(Auth::User()->administrador == 1)
    <form class="form" method="POST" action="{{url('lampada/insert')}}">
        <div class="form-group row">
            <div class="col-sm-2 col-form-label" id="lblNomeLampada">Lampada :</div>
            <div class="col-sm-4">
                <input type="text" name="nomeLampada" id="nomeLampada" maxlength="45" class="form-control" @if(isset($lampada->nomeLampada)) value="{{$lampada->nomeLampada}}" @endif required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2 col-form-label" id="lblVoltagemLampada">Voltagem :</div>
            <div class="col-sm-4">
                <input type="text" name="voltagemLampada" id="voltagemLampada" maxlength="10" class="form-control" @if(isset($lampada->voltagemLampada)) value="{{$lampada->voltagemLampada}}" @endif required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Comodo :</label>
            <div class="col-sm-4">
                <select name="idComodo" class="form-control">
                    @foreach ( $comodos as $com )
                        <option value="{{ $com->idComodo }}" @if(isset($lampada->idComodo) && $lampada->idComodo ==  $com->idComodo) selected="selected" @endif>{{ $com->nomeComodo }}</option>
                    @endforeach 
                </select>
            </div>
        </div>
        <input type="hidden" name="idLampada" id="idLampada" class="form-control" @if(isset($lampada->idLampada)) value="{{$lampada->idLampada}}" @endif>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <input type="submit" class="btn btn-primary" value="@if(isset($lampada->idLampada)) Editar  @else Cadastrar @endif"/>
    </form>
    @else
        <div class="row justify-content-center">
            <p>Você não possui permissão para acessar esta página.</p>
        </div>
    @endif
</div>
@endsection
