@extends('layouts.app')

@section('title', 'Одна новость')

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $news->title }}</div>
                    <div class="card-body">
                        @if (!$news->isPrivate || Auth::id())
                            <div class="card-img" style="background-image: url({{ $news->image ?? asset('img/default.jpg') }})"></div>
                            <p>{!! $news->text !!}</p>
                        @else
                            <br>Нет прав!
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

