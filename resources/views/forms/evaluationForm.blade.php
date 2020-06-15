@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Diga o que você acha desse produto</h3>
        </div>
        <div class="card-body">
            <form action="{{route('evaluationProduct.create')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="d-flex flex-row">
                    <div class="col-2">
                        <img src="{{route("home.productImg", $productAtributs->image)}}" style="height:100px" alt="..." class="img-rounded">
                    </div>
                    <div class="col-8">
                        <h2>{{$productAtributs->name}}</h2>
                        <input id="product" type="hidden" name="product" value="{{$productAtributs->id}}">
                    </div>
                </div>
                <div class="input-group">
                    <div class="form-group">
                        <label for="comment">Comentário</label>
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
                <a href="{{route('/')}}" class="btn btn-outline-secondary">Cancelar</a>
            </form>
            
            <div class="card mt-4">
                <div class="card-head">
                    <h4>Avaliações de outros usuários</h4>
                </div>
                @foreach ($allEvaluationsProduct as $eval)
                   <div class="d-flex flex-column">
                       <div class="d-flex flex-row align-items-center">
                           <i class="fa fa-user text-secondary p-1" aria-hidden="true"></i>
                           <p class="m-0 p-1">{{$eval->name}}</p>
                       </div>
                       <div class="card m-3">
                            <p class="p-1">{{$eval->content}}</p>
                       </div>
                   </div>
                @endforeach
                {{$allEvaluationsProduct->links()}}
            </div>
        </div>
    </div>
</div>

@endsection
