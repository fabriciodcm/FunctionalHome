@extends('layouts.app')

@section('content')
<div class="container">
<table class="table .table-sm .table-hover">
  <thead>
    <tr>
        <th>#</th>
        <th scope="col">Id</th>
        <th scope="col">Lampada</th>
        <th scope="col">Voltagem</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    
    @foreach ( $lampadas as $lamp )
    <tr> 
        <th scope="row"><button onClick="">
          +
        </button></th>
        <td>{{ $lamp->idLampada }}</td>
        <td>{{ $lamp->nomeLampada }}</td>
        <td>{{ $lamp->voltagemLampada }}</td>
        <td><a href="/lampada/edit/{{ $lamp->idLampada }}"><i class="material-icons">edit</i></a></td>
        <td><a href="/lampada/delete/{{ $lamp->idLampada }}" style="color:red"><i class="material-icons danger">delete</i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="container">
@endsection