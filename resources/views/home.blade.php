@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::User()->solicitacaoAceita != 1 && Auth::User()->administrador != 1)
                    Sua solicitação aguarda aceitação do administrador.
                    @else
                    Bem vindo ao Functional Home.
                   
                    <table class="table .table-sm .table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                                <th scope="row">
                                    <button onclick="Atualizar('u')">Atualizar</button>
                                </th>
                                <td>Umidade:</td>
                                <td id="u"></td>
                            </tr>
                            <tr> 
                                <th scope="row">
                                    <button onclick="Atualizar('z')">Atualizar</button>
                                </th>
                                <td>Temperatura:</td>
                                <td id="z"></td>
                            </tr>
                            <tr> 
                                <th scope="row">
                                    <button onclick="Atualizar('j')">Atualizar</button>
                                </th>
                                <td>Fumaça:</td>
                                <td id="j"></td>
                            </tr>
                            <tr> 
                                <th scope="row">
                                    <button onclick="Atualizar('e')">Atualizar</button>
                                </th>
                                <td>Gases:</td>
                                <td id="e"></td>
                            </tr>
                            <tr> 
                                <th scope="row">
                                    <button onclick="Atualizar('w')">Atualizar</button>
                                </th>
                                <td>Umidade Solo:</td>
                                <td id="w"></td>
                            </tr>
                            <tr> 
                                <th scope="row">
                                    <button onclick="Atualizar('m')">Atualizar</button>
                                </th>
                                <td>Presença:</td>
                                <td id="m"></td>
                            </tr>
                            <tr> 
                                <th scope="row">
                                    <button onclick="Atualizar('p')">Abrir/Fechar</button>
                                </th>
                                <td>Portão Garagem:</td>
                                <td id="p"></td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<link href="{{ asset('css/bootstrap-toggle.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
<script type="text/javascript">
    function Atualizar(idArduino){
        $.ajax({
          url: "home/ligaDesliga",
          method : "POST",
          data : { id : idArduino } ,
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        }).done(function($data){
            if(idArduino != "p")
            {
                $("#" + idArduino).text($data);
            }
        });
    }
</script>
@endsection
