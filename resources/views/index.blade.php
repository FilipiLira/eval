@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Produtos</h1>
        <div class="d-flex flex-column">
           @if (isset($products))
                @foreach ($products as $product)
                     @if ($product)
                         <div class="d-flex flex-row">
                             <div class="p-1 col-2">
                                 <img src="{{route("home.productImg", $product->image)}}" style="height:100px" alt="..." class="img-rounded">
                             </div>
                             <div class="p-1 col-8 d-flex flex-column">
                                 <h5>{{$product->name}}</h5>
                                 <p>{{$product->description}}</p>
                             </div>
                             <div class="col-2">
                                 <button class="btn btn-warning">
                                     <i class="fa fa-star" aria-hidden="true"></i>
                                 </button>
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