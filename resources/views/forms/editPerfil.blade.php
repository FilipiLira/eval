@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts.lateralUserDashboard')
        </div>
        <div class="col-8">
            <form method="post" action="{{route('user.userUpdate')}}" class="d-flex flex-row" style="flex-wrap: wrap" enctype="multipart/form-data">
                @csrf
                <div class="col-8 form-group">
                    <label for="name">Nome</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{$userData->name}}">
                </div>
                <div class="col-4 form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" type="text" name="email" value="{{$userData->email}}">
                </div>
                <div class="col-6 form-group">
                    <label for="password">Senha</label>
                    <input id="password" class="form-control" type="password" name="password" value="********">
                </div>
                <div class="col-6 form-group">
                    <label for="password_confirm">Confirmar senha</label>
                    <input id="password_confirm" class="form-control" type="password">
                </div>
                <div class="col-12 pb-2">
                    <a href="{{route('user.userDeletePerfil', Auth::user()->id)}}" class="btn">Excluir conta</a>
                </div>
                <div class="btn-group px-3" role="group" aria-label="Button group">
                    <button class="btn btn-success" type="submit">Editar</button>
                    <a href="{{route('home.home')}}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
