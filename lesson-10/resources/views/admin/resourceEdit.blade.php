@extends('layouts.app')

@section('title', 'Админка - добавить/редактировать ресурс')

@section('menu')
@include('menu.admin')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form enctype="multipart/form-data"
                  action=" @if (!$resource->id){{ route('admin.resources.store') }} @else {{ route('admin.resources.update', $resource) }}@endif"
                  method="post">
                @csrf
                @if ($resource->id) @method('PATCH') @endif
                <div class="form-group">
                    <label for=resTitle">Название ресурса</label>
                    @if ($errors->has('name'))
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->get('name') as $error)
                        {{ $error }}
                        @endforeach
                    </div>
                    @endif
                    <input name="name" type="text" class="form-control" id="resTitle"
                           value="{{ old('name') ?? $resource->name ?? "" }}">
                </div>

                <div class="form-group">
                    <label for="resLink">Link</label>
                    @if ($errors->has('link'))
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->get('link') as $error)
                        {{ $error }}
                        @endforeach
                    </div>
                    @endif
                    <input name="link" type="url" class="form-control" id="resLink"
                           value="{{ old('name') ?? $resource->link ?? "" }}">
                </div>
                <div class="form-group">
                    <button class="form-control"
                            type="submit">@if ($resource->id){{__('Изменить')}}@else{{__('Добавить')}}@endif</button>

                </div>

            </form>
        </div>
    </div>
</div>
@endsection
