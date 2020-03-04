@extends('layouts.main')

@section('title')
    @parent Новости
@endsection

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <div class="row">

            @forelse($news as $item)
            <div class="col-sm mt-4">
                <div class="card" style="width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title">{{ $item['title'] }}</h5>
                        @if (!$item['isPrivate'])
                            <a href="{{ route('news.One', $item['id']) }}" class="btn btn-primary">Подробнее...</a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
                <p>Нет новостей</p>
            @endforelse

    </div>
@endsection
