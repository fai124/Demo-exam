<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Конференции.РФ — Авторизация</title>
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
<a href="{{ Route('dashboard') }}">
<div class="header">
<h1>Конференции.РФ</h1>
<div>
</a>
<br>
<div class="form-container">
<h2>Авторизация</h2>

<form action="{{ Route('login') }}" method="POST">
@csrf

<label for="login">Логин</label>
<input type="text" name="login" id="login" placeholder="Введите логин" value="{{ old('login') }}">
@error('login')
<div class="error-message">{{ $message }}</div>
@enderror

<label for="password">Пароль</label>
<input type="password" name="password" id="password" placeholder="Введите пароль">
@error('password')
<div class="error-message">{{ $message }}</div>
@enderror

<button type="submit">Войти</button>
</form>

<p class="link">Ещё не зарегистрированы? <a href="{{ Route('register') }}">Регистрация</a></p>
</div>
</body>
</html>
