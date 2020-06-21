@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="d-flex flex-row col-2">
                <div class="p-1 d-flex flex-column">
                    <img src="{{route("home.productImg", $product->image)}}" style="height:175px" alt="..." class="img-rounded">
                    <p style="font-size: 1.3rem">{{$product->name}}</p>
                    <div class="d-flex flex-row align-items-center">
                        <i id="star-1" class="fa fa-star star text-warning m-1" style="cursor: pointer; font-size: 1.3rem" aria-hidden="true"></i>
                        <p class="m-0" style="font-size: 0.9rem"></p>
                    </div>
                </div>
            </div>
            @if (isset($discussionsProduct))
                @foreach ($discussionsProduct as $item)
                    <div class="d-flex flex-row p-2">
                        <div class="d-flex flex-column justify-content-center align-items-center col-2">
                            <div style="height: 100px;boder: 1px solid rgb(155, 153, 153)">
                                <img class="img-fluid" src="{{url('/img/perfil-twitter.png')}}" alt="user" style="width: 70px;">
                            </div>
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
            @endif
        </div>
@endsection