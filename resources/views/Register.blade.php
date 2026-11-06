<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Конференции.РФ — Регистрация</title>
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
<div class="form-container">
<h2>Регистрация</h2>

<form action="{{ Route('register') }}" method="POST">
@csrf

<label for="login">Логин</label>
<input type="text" name="login" id="login" placeholder="латиница и цифры, от 6 символов" value="{{ old('login') }}">
@error('login')
<div class="error-message">{{ $message }}</div>
@enderror

<label for="password">Пароль</label>
<input type="password" name="password" id="password" placeholder="минимум 8 символов">
@error('password')
<div class="error-message">{{ $message }}</div>
@enderror

<label for="FIO">ФИО</label>
<input type="text" name="FIO" id="FIO" placeholder="Иванов Иван Иванович" value="{{ old('FIO') }}">
@error('FIO')
<div class="error-message">{{ $message }}</div>
@enderror

<label for="number">Телефон</label>
<input type="text" name="number" id="number" placeholder="8(XXX)XXX-XX-XX" value="{{ old('number') }}">
@error('number')
<div class="error-message">{{ $message }}</div>
@enderror

<label for="email">Email</label>
<input type="text" name="email" id="email" placeholder="example@mail.ru" value="{{ old('email') }}">
@error('email')
<div class="error-message">{{ $message }}</div>
@enderror

<button type="submit">Создать пользователя</button>
</form>

<p class="link">Уже есть аккаунт? <a href="{{ Route('login') }}">Войти</a></p>
</div>
</body>
</html>
