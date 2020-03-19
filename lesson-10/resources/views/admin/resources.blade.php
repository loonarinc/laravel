@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>Ресурсы</h2>
            @forelse($links as $item)
                <div class="col-md-12 card">
                    <div class="card-body">
                        <h2>{{ $item->name }}</h2>
                        <h2>{{ $item->link }}</h2>

                        <form
                            action="{{ route('admin.resources.destroy', $item) }}"
                              method="post">
                            <a href="{{ route('admin.resources.edit', $item) }}"><button type="button" class="btn btn-success">Edit</button></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p>Нет новостей</p>
            @endforelse
        </div>
    </div>
@endsection
