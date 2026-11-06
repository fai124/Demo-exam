<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Конференции.РФ — Создание заявки</title>
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body>
    <div class="form-container">
        <h2>Создание заявки</h2>

        <form action="{{ route('booking.store') }}" method="POST">
            @csrf

            <label for="room_id">Помещение</label>
            <select name="room_id" id="room_id">
                <option value="">Выберите помещение</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }} ({{ $room->price }} ₽)</option>
                @endforeach
            </select>
            @error('room_id')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <label for="date">Дата начала конференции</label>
            <input type="date" name="date" id="date" value="{{ old('date') }}">
            @error('date')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <label for="payment">Способ оплаты</label>
            <select name="payment" id="payment">
                <option value="">Выберите способ оплаты</option>
                <option value="cash">Очный платёж</option>
                <option value="sbp">СБП</option>
            </select>
            @error('payment')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <button type="submit">Отправить</button>
        </form>

        <p class="link"><a href="{{ route('dashboard') }}">На главную</a></p>
    </div>
</body>
</html>
