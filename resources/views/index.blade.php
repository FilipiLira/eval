@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Produtos</h1>
        <div class="d-flex flex-column" id="productsList" totalProducts="{{count($products)}}">
           @if (isset($products))
                @foreach ($products as $key => $product)
                     @if ($product)
                         <div class="d-flex flex-row product-row">
                             <div class="p-1 col-2">
                                 <img src="{{route("home.productImg", $product->image)}}" style="height:100px" alt="..." class="img-rounded">
                             </div>
                             <div class="p-1 col-8 d-flex flex-column">
                                 <h5>{{$product->name}}</h5>
                                 <p>{{$product->content}}</p>
                             </div>
                             <div class="col-2 d-flex flex-column align-items-center justify-content-center">
                                <a href="{{route('evaluationProduct', $product->product_id)}}">
                                    <button class="btn btn-warning">
                                        Avaliar
                                    </button>
                                </a>
                                <div>
                                    <div id="avaliation{{$key}}" class="d-flex flex-row align-items-center" avaliation='{{$product->key}}' style="height: 50px">
                                        
                                        <i id="star-1" class="fa fa-star pr-2 star text-secondary" style="cursor: pointer; font-size: 1.3rem" aria-hidden="true"></i>
                                        <i id="star-2" class="fa fa-star pr-2 star text-secondary" style="cursor: pointer; font-size: 1.3rem" aria-hidden="true"></i>
                                        <i id="star-3" class="fa fa-star pr-2 star text-secondary" style="cursor: pointer; font-size: 1.3rem" aria-hidden="true"></i>
                                        <i id="star-4" class="fa fa-star pr-2 star text-secondary" style="cursor: pointer; font-size: 1.3rem" aria-hidden="true"></i>
                                        <i id="star-5" class="fa fa-star pr-2 star text-secondary" style="cursor: pointer; font-size: 1.3rem" aria-hidden="true"></i>
                                    </div>
                                </div>
                             </div>
                         </div>
                     @else
                         <div class="d-flex flex-row justify-content-center">
                             <div class="d-flex flex-column">
                                 <p class="display-4">Comece a avaliar!</p>
                                 <p style="text-align: center; font-size: 1rem">Cadastre seu primeiro produto agora.</p>
                             </div>
                         </div>
                     @endif
                @endforeach
                {{$products->links()}}
           @endif
        </div>
    </div>
@endsection