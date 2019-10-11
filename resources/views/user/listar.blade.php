@extends('layouts.app')

@section('content')
       
@if(Auth::check() && Auth::User()->administrador)
<div class="container"> 
<table class="table .table-sm .table-hover">
  <thead>
    <tr>
        <th>#</th>
        <th scope="col">Id</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Aceito</th>
        <th scope="col">Administrador</th>
        <th></th>
        <th></th>
    </tr>
  </thead>
  <tbody>
    
    @foreach ( $users as $user )
    <tr> 
        <th scope="row"><button onClick="">
          +
        </button></th>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td><input type="checkbox" class="check_sol" data-value="{{ $user->id }}" {{ $user->solicitacaoAceita  ? 'checked' : '' }} /></td>
        <td><input type="checkbox" class="check_adm" data-value="{{ $user->id }}" {{ $user->administrador  ? 'checked' : '' }} /></td>
        <td><a href="/user/edit/{{ $user->id }}"><i class="material-icons">edit</i></a></td>
        <td><a href="/user/delete/{{ $user->id }}" style="color:red"><i class="material-icons danger">delete</i></a></td>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<script type="text/javascript">

$(document).ready(function(){
  $(".check_sol").on("click",function(){
    var userId = $(this).data('value');
    var statusChecked = this.checked;
    $.ajax({
      url: "setAceite",
      method : "POST",
      data : { id : userId, status : statusChecked } ,
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    }).done(function() {
      
    });
  });

  $(".check_adm").on("click",function(){
    var userId = $(this).data('value');
    var statusChecked = this.checked;
    $.ajax({
      url: "setAdmin",
      method : "POST",
      data : { id : userId, status : statusChecked } ,
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    }).done(function() {
      
    });
  });
});
</script>
@else
<div class="container">
  <div class="row justify-content-center">
    <p>Você não possui permissão para acessar esta página.</p>
  </div>
</div>
@endif

@endsection