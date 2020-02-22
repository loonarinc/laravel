@extends('layouts.main')

@section('title')
    @parent Категории новостей
@endsection

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <h2>Новости по категории {{ $category }}</h2>
    @forelse($news as $item)
    <div class="card m-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $item['title'] }}</h5>
            @if (!$item['isPrivate'])
            <a href="{{ route('news.One', $item['id']) }}" class="btn btn-primary">Подробнее...</a>
            @endif
        </div>
    </div>
    @empty
        <p>Нет новостей</p>
    @endforelse
@endsection
