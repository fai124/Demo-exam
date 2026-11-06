<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Конференции.РФ — Мои заявки</title>
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
        <h2>Мои заявки</h2>

        @foreach($bookings as $booking)
            <div class="booking-card">
                <div class="booking-info">
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

                @if($booking->status === 'completed' && !$booking->review)
                    <form action="{{ route('booking.storeReview', $booking) }}" method="POST">
                        @csrf
                        <textarea name="review" placeholder="Оставьте отзыв о мероприятии" rows="3"></textarea>
                        <button type="submit" class="btn-submit">Отправить отзыв</button>
                    </form>
                @endif

                @if($booking->review)
                    <div class="review">
                        <strong>Отзыв:</strong>
                        <p>{{ $booking->review }}</p>
                    </div>
                @endif
            </div>
        @endforeach

        <p class="link"><a href="{{ route('dashboard') }}">На главную</a></p>
    </div>
</body>
</html>
