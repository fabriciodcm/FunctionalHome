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
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
