@extends('layouts.main')

@section('title')
    @parent Категорий
@endsection

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <h2>Категории новостей</h2>
    @forelse($categories as $item)
        <div class="m-3">
            <a href="{{ route('news.categoryId', $item['name']) }}" class="btn btn-secondary btn-lg active"
               role="button" aria-pressed="true">{{ $item['category'] }}</a>
        </div>

    @empty
        <p>Нет категорий</p>
    @endforelse
@endsection
