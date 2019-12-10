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
        <th scope="row">
            <input type="checkbox" value="{{ $lamp->idLampada }}" class="ligadesliga" data-toggle="toggle" data-offstyle="danger">
          </th>
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
  <!-- BOOTSTRAP
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  -->
  <link href="{{ asset('css/bootstrap-toggle.min.css') }}" rel="stylesheet">
  <script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>

  <script type="text/javascript">

    $(document).ready(function(){
      $(".toggle").click(function(){
        //if($(this).hasClass("off")){} verifica se esta desligado
        var id = $(this).find("input").val();    
        $.ajax({
          url: "ligaDesliga",
          method : "POST",
          data : { id : id } ,
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        }).done(function($data){
          console.log($data);
        });
      });

      $(".ligadesliga").on("click", function(){
        var id = $(this).data('value');    
        alert(id);
        $.ajax({
          url: "ligaDesliga",
          method : "POST",
          data : { id : id } ,
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        }).done(function($data){
          console.log($data);
        });
      });

    });

    
     
  </script>
@endsection