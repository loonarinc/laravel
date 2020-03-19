@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>Пользователи</h2>
            @forelse($users as $user)
                <div class="col-md-12 card">
                    <div class="card-body">
                        {{ $user->name }}
                        @if ($user->is_admin)
                            <a href="{{route('admin.toggleAdmin', $user)}}"><button type="button" class="btn btn-danger">Разжаловать</button></a>
                            @else
                            <a href="{{route('admin.toggleAdmin', $user)}}"> <button type="button" class="btn btn-success">Повысить до Админа</button></a>
                            <button class="testApi" data-id="{{ $user->id }}">Test Api</button>
                            @endif
                    </div>
                </div>
            @empty
                <p>Нет пользователей</p>
            @endforelse
            {{ $users->links() }}
        </div>
    </div>
    </div>
    <script>
        let buttons = document.querySelectorAll('.testApi');
        buttons.forEach((elem) => {
            elem.addEventListener('click', () => {
                console.log('sending....');
                let id = elem.getAttribute('data-id');
                (async ()=>{
                    const response = await fetch('/api/apiTest/?id=' + id);
                    const answer = await response.json();
                    console.log(answer);
                })();
                })
          });
    </script>
@endsection
