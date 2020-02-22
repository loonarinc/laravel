@extends('layouts.app')

@section('title', 'Новости')

@section('menu')
    @include('menu.main')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @forelse($news as $item)
                <div class="col-md-12 card">
                    <div class="card-body">
                        <h2>{{ $item['title'] }}</h2>
                        @if (!$item['isPrivate'])
                            <a href="{{ route('news.One', $item['id']) }}">Подробнее...</a>
                        @endif
                    </div>
                </div>
            @empty
                <p>Нет новостей</p>
            @endforelse
        </div>
    </div>

@endsection
