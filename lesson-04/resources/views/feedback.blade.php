@extends('layouts.app')

@section('title', 'Feedback')

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Feedback</h1>
            </div>
            <div class="col-md-8">
                <form action="{{ route('feedback') }}" method="get">
                    @csrf
                    <div class="form-group">
                        <label for="name_value">Введите имя</label>
                        <input name="name" type="text" class="form-control" id="name_value" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="email_value">Введите e-mail</label>
                        <input name="email" type="email" class="form-control" id="email_value" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="feedback_text">Ваш отзыв/предложение</label>
                        <textarea name="fb_text" class="form-control" rows="5" id="feedback_text">{{ old('fb_text') }}</textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-primary" value="Отправить" id="addNews">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
