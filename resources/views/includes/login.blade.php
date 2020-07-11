<form action="{{ route('login') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="email">Ваша почта</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="form-group">
        <div class="row">
            <div class="col-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">Запомнить меня</label>
                </div>
            </div>

            <div class="col-6 text-right">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">Забыли пароль?</a>
                @endif
            </div>
        </div>
    </div>

    <input type="submit" class="btn btn-success btn-block" value="Авторизация">
</form>
