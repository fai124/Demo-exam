<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Конференции.РФ — Создание зала</title>
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
<div class="form-container">
<h2>Создание зала</h2>

<form action="{{ Route('room.store') }}" method="POST">
@csrf

<label for="name">Название зала</label>
<input type="text" name="name" id="name" placeholder="Введите название зала" value="{{ old('name') }}">
@error('name')
<div class="error-message">{{ $message }}</div>
@enderror
<button type="submit">Создать зал</button>
</form>

<p class="link"><a href="{{ Route('dashboard') }}">На главную</a></p>
</div>
</body>
</html>
