@extends('layouts.app')

@section('content')
<div class="container">
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
                @if (isset($discussions))
                    @foreach ($discussions as $item)
                        <div class="d-flex flex-row p-2">
                            <div class="d-flex flex-column justify-content-center align-items-center col-2">
                                {{-- <div style="height: 100px;boder: 1px solid rgb(155, 153, 153)">
                                    <img class="img-fluid" src="{{url('/img/perfil-twitter.png')}}" alt="user" style="width: 70px;">
                                </div> --}}
                                <div class="d-flex flex-column">
                                    <?php 
                                       $dateTime = explode(" ", $item->user_created_at);
                                       $createdDate = date('d/m/Y', strtotime($dateTime[0]));
                                       $createdTime = date('H:i', strtotime($dateTime[1]));
                                    ?>
                                    <p class="m-0">Created by {{ $item->name }}</p>
                                    <p style="font-size: 0.7rem; text-align: center">{{$createdDate}}</p>
       
                                </div>
                            </div>
                        <a href="{{route('discussionPage', $item->id)}}" class="d-flex flex-row col-8" style="text-decoration: none">
                                <div class="col-10 d-flex flex-column discussion-row">
                                    <div class="">
                                        <p>Topico: {{$item->topic}}</p>
                                        <p>Topico: {{$item->topic_description}}</p>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <?php 
                                           $dateTime = explode(" ", $item->created_at);
                                           $createdDate = date('d/m/Y', strtotime($dateTime[0]));
                                           $createdTime = date('H:i', strtotime($dateTime[1]));
                                        ?>
                                        <p class="col-3 p-1"><i class="fa fa-calendar" aria-hidden="true"></i> {{$createdDate}}</p>
                                        <p class="col-2 p-1"><i class="fa fa-clock-o" aria-hidden="true"></i></i> {{$createdTime}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    {{$discussions->links()}}
                    
                @endif

                @if (count($discussions) == 0)
                <div class="d-flex flex-row justify-content-center">
                    <div class="d-flex flex-column">
                        <p class="display-4">Comece a avaliar!</p>
                        <p style="text-align: center; font-size: 1rem">Você ainda não tem tópicos abertos.</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
