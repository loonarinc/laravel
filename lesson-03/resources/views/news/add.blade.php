@extends('layouts.main')

@section('title')
    @parent Новости
@endsection

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <h3>Добавить новость</h3>
    <form action="#"
        <div class="form-group">
            <label for="exampleFormControlInput1">Email автора</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Выберите тему новости</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>Спорт</option>
                <option>Политика</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Текст новости</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Добавьте фотографию новости</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Отправить на модерацию</button>
    </form>

@endsection
