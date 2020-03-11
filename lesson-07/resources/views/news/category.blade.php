@extends('layouts.app')

@section('title', 'Категории новостей')

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @forelse($categories as $item)
                <div class="col-md-12 card">
                    <div class="card-body">
                        <h2><a href="{{ route('news.categoryId', $item['name']) }}">{{ $item['category'] }}</a></h2>
                    </div>
                </div>
            @empty
                <p>Нет категорий</p>
            @endforelse

        </div>
    </div>
@endsection
