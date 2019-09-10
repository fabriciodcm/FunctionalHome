@extends('layouts.app')

@section('content')
<div class="container">
<table class="table .table-sm .table-hover">
  <thead>
    <tr>
        <th>#</th>
        <th scope="col">Id</th>
        <th scope="col">Comodo</th>
        <th></th>
        <th></th>
    </tr>
  </thead>
  <tbody>
    
    @foreach ( $comodos as $com )
    <tr> 
        <th scope="row"><button onClick="">
          +
        </button></th>
        <td>{{ $com->idComodo }}</td>
        <td>{{ $com->nomeComodo }}</td>
        <td><a href="/comodo/edit/{{ $com->idComodo }}"><i class="material-icons">edit</i></a></td>
        <td><a href="/comodo/delete/{{ $com->idComodo }}" style="color:red"><i class="material-icons danger">delete</i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="container">
@endsection