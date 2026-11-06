<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Конференции.РФ — Панель администратора</title>
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
<h2>Панель администратора</h2>

@foreach ( $bookings as $booking )
<div class="booking-card">
<div class="booking-info">
<p><strong>Пользователь:</strong> {{ $booking->user->FIO }}</p>
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

<form action="{{ Route('booking.update_status', $booking) }}" method="POST" class="form-inline">
@csrf
<select name="status">
<option value="new" @if ( $booking->status == 'new' ) selected @endif>Новая</option>
<option value="confirmed" @if ( $booking->status == 'confirmed' ) selected @endif>Мероприятие назначено</option>
<option value="completed" @if ( $booking->status == 'completed' ) selected @endif>Завершено</option>
</select>
<button type="submit" class="btn-submit">Изменить статус</button>
</form>
</div>
@endforeach

<p class="link"><a href="{{ Route('dashboard') }}">На главную</a></p>
</div>
</body>
</html>
