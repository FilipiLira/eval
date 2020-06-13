@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>

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
                    @foreach ($allProductsUser as $item)

                        @if ($item)
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
                        @endif

                    @endforeach
                    {{$allProductsUser->links()}}
                    
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
