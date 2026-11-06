<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Конференции.РФ — Мои заявки</title>
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
<div class="header">
<h1>Конференции.РФ</h1>
<div>
<span>{{ Auth::user()->FIO }}</span>
<form action="{{ Route('logout') }}" method="POST" class="form-inline">
@csrf
<button type="submit" class="btn-logout">Выйти</button>
</form>
</div>
</div>

<div class="container">
<h2>Мои заявки</h2>

@foreach ( $bookings as $booking )
<div class="booking-card">
<div class="booking-info">
<p><strong>Зал:</strong> {{ $booking->room->name }}</p>
<p><strong>Дата:</strong> {{ $booking->date }}</p>
<p><strong>Оплата:</strong> {{ $booking->payment === 'cash' ? 'Очный платёж' : 'СБП' }}</p>
<p><strong>Статус:</strong>
@if ( $booking->status == 'new' )
Новая
@elseif ( $booking->status == 'confirmed' )
Мероприятие назначено
@elseif ( $booking->status == 'completed' )
Завершено
@endif
</p>
</div>

@if ( $booking->status == 'completed' && !$booking->comment )
<form action="{{ Route('booking.review', $booking) }}" method="POST">
@csrf
<textarea name="comment" placeholder="Оставьте отзыв о мероприятии" rows="3"></textarea>
<button type="submit" class="btn-submit">Отправить отзыв</button>
</form>
@endif

@if ( $booking->comment )
<div class="review">
<strong>Отзыв:</strong>
<p>{{ $booking->comment }}</p>
</div>
@endif
</div>
@endforeach

<p class="link"><a href="{{ Route('dashboard') }}">На главную</a></p>
</div>
</body>
</html>
