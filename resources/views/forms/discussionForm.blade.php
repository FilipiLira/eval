@extends('layouts.app')

@section('content')
        <div class="container d-flex flex-row">
            <div class="d-flex flex-row col-3">
                <div class="p-3 d-flex flex-column">
                    <img src="{{route("home.productImg", $product->image)}}" style="height:175px" alt="..." class="img-fluid">
                    <p style="font-size: 1.3rem">{{$product->name}}</p>
                    <div class="d-flex flex-row align-items-center">
                        <i id="star-1" class="fa fa-star star text-warning m-1" style="cursor: pointer; font-size: 1.3rem" aria-hidden="true"></i>
                        <p class="m-0" style="font-size: 0.9rem">{{$evalMed['evalMed']}}</p>
                    </div>
                </div>
            </div>
            <form class="col-10" action="{{route('createDiscussion')}}" method="post">
                @csrf
                <input type="hidden" id="product" name="product" value="{{$product->id}}">
                <div class="form-group">
                    <label for="topic"><h3>Topico</h3></label>
                    <input id="topic" class="form-control" type="text" name="topic">
                </div>
                <div class="form-group">
                    <label for="my-textarea">O que você quer falar sobre este produto?</label>
                    <textarea id="topic_description" class="form-control" name="topic_description" rows="8"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Enviar</button>
                <a href="{{route('/')}}" class="btn btn-outline-secondary">Cancelar</a>
            </form>
        </div>
@endsection