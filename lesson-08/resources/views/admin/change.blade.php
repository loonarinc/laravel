@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <h2>Сделать модератором</h2>
        <div class="row justify-content-center">

                @forelse($users as $item)
                    <div class="col-md-8 card">
                        <form method="post" action="{{ route('admin.changingProfile', $item) }}">
                            @csrf
                            <h2>{{ $item->name }}</h2>

                            <div class="form-check">
                                <input @if ($item->is_admin == 1 || old('is_admin') == 1) checked @endif name="is_admin"
                                       class="form-check-input" type="checkbox" value="1" id="is_admin">
                                <label class="form-check-label" for="is_admin">
                                    Права модератора
                                </label>
                            </div>
                            <div class="form-group">
                                <button class="form-control" type="submit">Записать права</button>

                            </div>
                        </form>
                    </div>
                @empty
                    <p>Нет юзеров</p>
                @endforelse

        </div>
    </div>
@endsection
