<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Конференции.РФ — Авторизация</title>
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body>
    <div class="form-container">
        <h2>Авторизация</h2>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <label for="login">Логин</label>
            <input type="text" name="login" id="login" placeholder="Введите логин" value="{{ old('login') }}">
            @error('login')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" placeholder="Введите пароль">
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <button type="submit">Войти</button>
        </form>

        <p class="link">Ещё не зарегистрированы? <a href="{{ route('register') }}">Регистрация</a></p>
    </div>
</body>
</html>
