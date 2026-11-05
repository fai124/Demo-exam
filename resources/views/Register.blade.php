<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Конференции.РФ — Регистрация</title>
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body>
    <div class="form-container">
        <h2>Регистрация</h2>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <label for="login">Логин</label>
            <input type="text" name="login" id="login" placeholder="латиница и цифры, от 6 символов" value="{{ old('login') }}">
            @error('login')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" placeholder="минимум 8 символов">
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <label for="FIO">ФИО</label>
            <input type="text" name="FIO" id="FIO" placeholder="Иванов Иван Иванович" value="{{ old('FIO') }}">
            @error('FIO')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <label for="number">Телефон</label>
            <input type="text" name="number" id="number" placeholder="8(XXX)XXX-XX-XX" value="{{ old('number') }}">
            @error('number')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="example@mail.ru" value="{{ old('email') }}">
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <button type="submit">Создать пользователя</button>
        </form>

        <p class="link">Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
    </div>
</body>
</html>
