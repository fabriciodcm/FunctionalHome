@extends('layouts.app')

@section('content')
<div class="container">
<table class="table .table-sm .table-hover">
  <thead>
    <tr>
        <th>#</th>
        <th scope="col">Id</th>
        <th scope="col">Comodo</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach ( $comodos as $com )
    <tr> 
        <th scope="row"><button onClick="">
          +
        </button></th>
        <td><a href="/comodo/edit/{{ $com->idComodo }}">{{ $com->idComodo }}</a></td>
        <td><a href="/comodo/edit/{{ $com->idComodo }}">{{ $com->nomeComodo }}</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="container">
@endsection