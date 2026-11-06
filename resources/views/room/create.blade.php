<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Конференции.РФ — Создание зала</title>
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body>
    <div class="form-container">
        <h2>Создание зала</h2>

        <form action="{{ route('room.store') }}" method="POST">
            @csrf

            <label for="name">Название зала</label>
            <input type="text" name="name" id="name" placeholder="Введите название зала" value="{{ old('name') }}">
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <label for="price">Стоимость</label>
            <input type="number" name="price" id="price" placeholder="Введите стоимость" value="{{ old('price') }}">
            @error('price')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <button type="submit">Создать зал</button>
        </form>

        <p class="link"><a href="{{ route('dashboard') }}">На главную</a></p>
    </div>
</body>
</html>
