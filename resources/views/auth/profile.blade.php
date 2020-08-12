@extends('layouts.android')

@section('content')
    <h3 class="text-center">Учетная запись</h3>
    <div class="container" style="width: 75%;">
        <form action="{{ route('user.update', $user) }}" method="POST">
            <input type="hidden" name="_method" value="put">
            @csrf
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" @error('name') is-invalid @enderror required>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Ваша почта</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" @error('email') is-invalid @enderror required>

                @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Ваш номер телефона</label>
                <input type="phone" name="phone" id="phone" value="{{ $user->phone }}" class="form-control" @error('phone') is-invalid @enderror maxlength="13" required>

                @error('phone')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="profile_password">Пароль</label>
                <input type="password" name="password" id="profile_password" class="form-control" @error('password') is-invalid @enderror data-minlength="6" placeholder="Введите новый пароль" required>

                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm">Подтвердите пароль</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Подтвердите пароль" required autocomplete="new-password">
            </div>

            <input type="submit" class="btn btn-success btn-block" value="Сохранить">
        </form>
    </div>
@endsection
