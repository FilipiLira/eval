@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Novo Produto</h3>
        </div>
        <div class="card-body">
            <form action="{{route('home.createProduct')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                   <label for="name">Nome</label>
                    <input id="name" class="form-control" type="text" placeholder="Nome do produto" name="name">
                </div>
                <div class="input-group">
                    <div class="form-group">
                        <label for="comment">Descrição</label>
                        <textarea id="comment" class="form-control" name="comment" rows="10" cols="100"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Imagen do produto</label>
                    <input type="file" class="form-control-file" name="product_image" id="exampleFormControlFile1" accept="image/*" />
                </div>
                <p class="m-0" style="font-size: 1.3rem">Avalie este produto</p>
                <div class="d-flex flex-row pb-3">
                    <div class="stars-evaluation d-flex flex-row align-items-center" style="height: 50px">
                        <i id="star-1" class="fa fa-star pr-2 star text-secondary" style="cursor: pointer; font-size: 1.3rem" aria-hidden="true"></i>
                        <i id="star-2" class="fa fa-star pr-2 star text-secondary" style="cursor: pointer; font-size: 1.3rem" aria-hidden="true"></i>
                        <i id="star-3" class="fa fa-star pr-2 star text-secondary" style="cursor: pointer; font-size: 1.3rem" aria-hidden="true"></i>
                        <i id="star-4" class="fa fa-star pr-2 star text-secondary" style="cursor: pointer; font-size: 1.3rem" aria-hidden="true"></i>
                        <i id="star-5" class="fa fa-star pr-2 star text-secondary" style="cursor: pointer; font-size: 1.3rem" aria-hidden="true"></i>
                    </div>
                    <input id="evaluation" type="hidden" name="evaluation">
                </div>
                <button class="btn btn-success" type="submit">Enviar</button>
                <a href="{{route('home.home')}}" class="btn btn-outline-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

@endsection
