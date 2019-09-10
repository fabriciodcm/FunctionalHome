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
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    
    @foreach ( $eletros as $eletro )
    <tr> 
        <th scope="row"><button onClick="">
          +
        </button></th>
        <td>{{ $eletro->idEletrodomestico }}</td>
        <td>{{ $eletro->nomeEletrodomestico }}</td>
        <td>{{ $eletro->voltagemEletrodomestico }}</td>
        <td><a href="/eletrodomestico/edit/{{ $eletro->idEletrodomestico }}"><i class="material-icons">edit</i></a></td>
        <td><a href="/eletrodomestico/delete/{{ $eletro->idEletrodomestico }}" style="color:red"><i class="material-icons danger">delete</i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="container">
@endsection