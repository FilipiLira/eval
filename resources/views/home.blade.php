@extends('layouts.app')

@section('content')
<div class="container">
    <p>{{session()->get('key')}}</p>
    <div class="row justify-content-center">
        <div class="col-md-4">

            {{-- Dashboard lateral com include --}}
            @include('layouts.lateralUserDashboard')

            <div class="mt-4">
                <a href="{{route('home.newProduct')}}">
                    <button class="btn btn-primary btn-lg" style="width: 100%">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </a>
            </div>
        </div>
        <div class="col-md-8 d-flex flex-column">
            <h3>Produtos</h3>
            <div class="products pt-4">
                @if (isset($allProductsUser))
                    @foreach ($allProductsUser["products"] as $key => $product)

                    @if ($product)

                            <div class="d-flex flex-row product-row">
                                <div class="p-1 col-2">
                                    <img src="{{route("home.productImg", $product->image)}}" style="height:100px" alt="..." class="img-rounded">
                                </div>
                                <div class="p-1 col-8 d-flex flex-column justify-content-around">
                                    <h5>{{$product->name}}</h5>
                                    <div class="d-flex flex-row align-items-center">
                                        <p class="text-secondary m-0 mr-2">Forum</p>
                                        <div style="border-left: 1px solid rgb(167, 166, 166)">
                                        <a href="{{route('discussions', $product->id)}}"class="btn btn-outline-primary ml-3" data-toggle="tooltip" title="Topicos do forum">
                                                <i class="fa fa-users" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{route('newDiscussion', $product->id)}}" class="btn btn-outline-primary ml-3" data-toggle="tooltip" title="Novo Topico do forum">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                @foreach ($allProductsUser["evalMeds"] as $eval)
                                    @if ($eval['productId'] == $product->id)
                                        <div class="col-2 d-flex flex-column align-items-center justify-content-center">
                                           {{-- <a href="{{route('evaluationProduct', $product->id)}}" data-toggle="tooltip" title="Avaliar este Produto">
                                               <button class="btn btn-warning btn-sm">
                                                   Avaliar
                                               </button>
                                           </a> --}}
                                           <div>
                                                <div id="avaliation{{$key}}" class="d-flex flex-row align-items-center justify-content-center mt-1" avaliation='{{$eval['evalMed']}}'>
                                                   <i id="star-1" class="fa fa-star star text-warning m-1" style="cursor: pointer; font-size: 1.3rem" aria-hidden="true"></i>
                                                   <p class="m-1">{{$eval['evalMed']}}</p>
                                                </div>
                                                <p class="m-0 text-center">{{$eval['evalQuant']}} avaliações</p>
                                           </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        @else

                            <div class="d-flex flex-row justify-content-center">
                                <div class="d-flex flex-column">
                                    <p class="display-4">Comece a avaliar!</p>
                                    <p style="text-align: center; font-size: 1rem">Cadastre seu primeiro produto agora.</p>
                                </div>
                            </div>

                        @endif

                        {{-- @if ($item)
                            <div class="d-flex flex-row">
                                <div class="p-1 col-2">
                                    <img src="{{route("home.productImg", $item->image)}}" style="height:100px" alt="..." class="img-rounded">
                                </div>
                                <div class="p-1 col-8 d-flex flex-column">
                                    <h5>{{$item->name}}</h5>
                                    <p>{{$item->description}}</p>
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
                        @endif --}}

                    @endforeach
                    {{-- {{$allProductsUser['products']->links()}} --}}
                    
                @endif

                @if (count($allProductsUser) == 0)
                <div class="d-flex flex-row justify-content-center">
                    <div class="d-flex flex-column">
                        <p class="display-4">Comece a avaliar!</p>
                        <p style="text-align: center; font-size: 1rem">Cadastre seu primeiro produto agora.</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
