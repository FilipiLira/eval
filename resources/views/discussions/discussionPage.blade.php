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
            <div class="d-flex flex-column">
                @foreach ($discussionPosts as $item)



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
                    {{-- <a href="{{route('discussionPage', $item->id)}}" class="d-flex flex-row col-8" style="text-decoration: none"> --}}
                        <div class="col-10 d-flex flex-column justify-content-around" style="border: 2px dashed rgb(158, 155, 155)">
                            <div class="">
                                <p>{{$item->body}}</p>
                            </div>
                            <div class="d-flex flex-row">
                                <div class="col-8 d-flex flex-row">
                                    <?php 
                                       $dateTime = explode(" ", $item->post_created);
                                       $createdDate = date('d/m/Y', strtotime($dateTime[0]));
                                       $createdTime = date('H:i', strtotime($dateTime[1]));
                                    ?>
                                    <p class="col-3 p-1 m-0"><i class="fa fa-calendar" aria-hidden="true"></i> {{$createdDate}}</p>
                                    <p class="col-2 p-1 m-0"><i class="fa fa-clock-o" aria-hidden="true"></i></i> {{$createdTime}}</p>
                                </div>
                                <div class="col-4 d-flex flex-row justify-content-end align-items-end">
                                    <i class="fa fa-thumbs-up btn-like" style="font-size: 1.5rem; color: #c4c6c8; cursor: pointer;" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        {{-- </a> --}}
                    </div>
                @endforeach
            </div>
            <div class="d-flex flex-column">
                @if ($user)
                    <div class="d-flex flex-row align-items-end py-2">
                        <img class="img-fluid pr-2" src="{{url('/img/perfil-twitter.png')}}" alt="user" style="width: 50px;">
                        <p class="m-0 pb-2">{{ $user->name}}</p>
                    </div>    
                @endif

                <h5 class="m-0 pt-3">Fazer post nesta discussão</h5>
                <form action="{{route('createPost')}}" method="post">
                    @csrf
                    <input type="hidden" name="type" value="POSTDISCUSSION">
                    <input type="hidden" name="discussion" value="{{$discussionId}}">
                    <div class="form-group">
                        <label for="my-input">Diga algo</label>
                        <textarea id="body" class="form-control" name="body" rows="8"></textarea>
                    </div>
                    <button class="btn btn-outline-success" type="submit">Postar</button>
                </form>
            </div>
        </div>
@endsection