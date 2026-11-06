<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Конференции.РФ — Панель администратора</title>
    <link rel="stylesheet" href="/css/dashboard.css">
</head>
<body>
    <div class="header">
        <h1>Конференции.РФ</h1>
        <div>
            <span>{{ Auth::user()->FIO }}</span>
            &nbsp;|&nbsp;
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" style="background:none;border:none;color:#fff;cursor:pointer;font-size:14px;">Выйти</button>
            </form>
        </div>
    </div>

    <div class="container">
        <h2>Панель администратора</h2>

        @foreach($bookings as $booking)
            <div class="booking-card">
                <div class="booking-info">
                    <p><strong>Пользователь:</strong> {{ $booking->user->FIO }}</p>
                    <p><strong>Зал:</strong> {{ $booking->room->name }}</p>
                    <p><strong>Дата:</strong> {{ $booking->date }}</p>
                    <p><strong>Оплата:</strong> {{ $booking->payment === 'cash' ? 'Очный платёж' : 'СБП' }}</p>
                    <p><strong>Статус:</strong>
                        @if($booking->status === 'new')
                            Новая
                        @elseif($booking->status === 'confirmed')
                            Мероприятие назначено
                        @elseif($booking->status === 'completed')
                            Завершено
                        @endif
                    </p>
                </div>

                <form action="{{ route('booking.updateStatus', $booking) }}" method="POST" style="display:inline;">
                    @csrf
                    <select name="status">
                        <option value="new" {{ $booking->status === 'new' ? 'selected' : '' }}>Новая</option>
                        <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Мероприятие назначено</option>
                        <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Завершено</option>
                    </select>
                    <button type="submit" class="btn-submit">Изменить статус</button>
                </form>
            </div>
        @endforeach

        <p class="link"><a href="{{ route('dashboard') }}">На главную</a></p>
    </div>
</body>
</html>
