@extends('layouts.app')

@section('title', 'Новости категории ' . $category)

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @forelse($news as $item)
                    <div class="card">
                        <div class="card-header">Новости по категории <strong>{{ $category }}</strong></div>
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
    </div>
@endsection
