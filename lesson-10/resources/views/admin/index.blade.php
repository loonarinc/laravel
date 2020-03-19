@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>Админка</h2>
            @forelse($news as $item)
                <div class="col-md-12 card">
                    <div class="card-body">
                        <h2>{{ $item->title }}</h2>


                        <form action="{{ route('admin.news.destroy', $item) }}" method="post">
                            <a href="{{ route('admin.news.edit', $item) }}"><button type="button" class="btn btn-success">Edit</button></a>
                            @csrf
                            @method('DELETE')
                       <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('news.One', $item->id) }}">Подробнее...</a>

                    </div>
                </div>
            @empty
                <p>Нет новостей</p>
            @endforelse
            {{ $news->links() }}
        </div>
    </div>
@endsection
