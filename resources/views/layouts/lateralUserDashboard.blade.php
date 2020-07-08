        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div>
                    <ul class="list-group" style="list-style: none">
                       <li class="p-2">
                        <a href="{{route('home.home')}}">Produtos</a>
                       </li>
                       <li class="p-2">
                       <a href="{{route('user.userDiscussions', Auth::user()->id)}}">Discursões</a>
                       </li>
                       <li class="p-2">
                       <a href="{{route('user.userEditPerfil', Auth::user()->id)}}">Editar perfil</a>
                       </li>
                    </ul>
                </div>
            </div>
        </div>