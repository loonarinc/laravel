@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>Админка</h2>
                <div class="col-md-12 card">
                    <div class="card-body">
                        <h2>Добавить категорию</h2>
                        <form enctype="multipart/form-data" action="{{ route('admin.addCategory') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="categoryTitle">Название категории</label>
                                <input name="category" type="text" class="form-control" id="categoryTitle"
                                       value="{{ $category->category ?? old('category') }}">
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Английское слово для URL</label>
                                <input name="name" type="text" class="form-control" id="categoryName"
                                       value="{{ $category->name ?? old('name') }}">
                            </div>
                            <div class="form-group">
                                <button class="form-control" type="submit">
                                    Добавить
                                </button>

                            </div>
                        </form>

                    </div>
                </div>
        </div>
    </div>
@endsection
