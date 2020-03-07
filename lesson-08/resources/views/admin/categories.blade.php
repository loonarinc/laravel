@extends('layouts.app')

@section('title', 'Админка - Редактор категорий')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @forelse($categories as $item)
        <div class="col-md-12 card">
            <div class="card-body">
                <h2>{{ $item['category'] }}</h2>
                <a href="{{ route('admin.updateCategory', $item) }}"><button type="button" class="btn btn-success">Edit</button></a>

            </div>
        </div>
        @empty
        <p>Нет категорий</p>
        @endforelse

    </div>
</div>
@endsection
