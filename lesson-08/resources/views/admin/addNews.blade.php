@extends('layouts.app')

@section('title', 'Админка - добавить новость')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form enctype="multipart/form-data"
                      action=" @if (!$news->id){{ route('admin.addNews') }} @else {{ route('admin.saveNews', $news) }}@endif"
                      method="post">
                    @csrf

                    <div class="form-group">
                        <label for="newsTitle">Название новости</label>
                        @if ($errors->has('title'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('title') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <input name="title" type="text" class="form-control" id="newsTitle"
                               value="{{ $news->title ?? old('title') }}">
                    </div>

                    <div class="form-group">
                        <label for="newsCategory">Категория новости</label>
                        @if ($errors->has('category_id'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('category_id') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <select name="category_id" class="form-control" id="newsCategory">
                            @forelse($categories as $item)
                                <option @if ($item['id'] == old('category')) selected
                                        @endif value="{{ $item['id'] }}">{{ $item['category'] }}</option>
                            @empty
                                <h2>Нет категории</h2>
                            @endforelse
                                <option value="55">не верная категория</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="newsText">Текст новости</label>
                        @if ($errors->has('text'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('text') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <textarea name="text" class="form-control" rows="5"
                                  id="newsText">{{ $news->text ?? old('text') }}</textarea>
                    </div>

                    <div class="form-group">
                        @if ($errors->has('image'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('image') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <input type="file" name="image">
                    </div>


                    <div class="form-check">
                        <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked @endif name="isPrivate"
                               class="form-check-input" type="checkbox" value="1" id="newsPrivate">
                        <label class="form-check-label" for="newsPrivate">
                        Новость private?
                        </label>
                    </div>

                    <div class="form-group">
                        <button class="form-control" type="submit">@if ($news->id)Изменить@else Добавить @endif</button>

                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
