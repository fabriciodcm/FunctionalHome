@extends('layouts.app')

@section('content')
<div class="container">
<table class="table .table-sm .table-hover">
  <thead>
    <tr>
        <th>#</th>
        <th scope="col">Id</th>
        <th scope="col">Eletrodoméstico</th>
        <th scope="col">Voltagem</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach ( $eletros as $eletro )
    <tr> 
        <th scope="row"><button onClick="">
          +
        </button></th>
        <td><a href="/eletrodomestico/edit/{{ $eletro->idEletrodomestico }}">{{ $eletro->idEletrodomestico }}</a></td>
        <td><a href="/eletrodomestico/edit/{{ $eletro->idEletrodomestico }}">{{ $eletro->nomeEletrodomestico }}</a></td>
        <td><a href="/eletrodomestico/edit/{{ $eletro->idEletrodomestico }}">{{ $eletro->voltagemEletrodomestico }}</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="container">
@endsection