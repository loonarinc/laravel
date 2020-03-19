@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>Изменение учётных данных пользователя</h2>
            <div class="col-md-8 card">
                <form method="post" action="{{ route('admin.updateProfile') }}">
                    @csrf

                    @if ($errors->has('name'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('name') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <?= Form::text('name', $user->name); ?><br><br>

                    @if ($errors->has('email'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('email') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <?= Form::text('email', $user->email); ?><br><br>

                    @if ($errors->has('password'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('password') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <?= Form::text('password', '', ['placeholder' => 'Текущий пароль']); ?><br><br>

                    @if ($errors->has('newPassword'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('newPassword') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <?= Form::text('newPassword', '', ['placeholder' => 'Новый пароль']); ?><br><br>
                    <?= Form::submit('Изменить', ['class' => 'btn btn-success']); ?>

                </form>
            </div>
        </div>
    </div>
@endsection
