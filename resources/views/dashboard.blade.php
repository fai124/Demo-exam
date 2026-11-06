<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Конференции.РФ</title>
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
<div class="welcome">
<h2>Добро пожаловать, {{ Auth::user()->FIO }}!</h2>

<a href="{{ Route('booking.create') }}" class="btn-create">Создать заявку</a>
<a href="{{ Route('booking.my') }}" class="btn-create">Мои заявки</a>

@if ( Auth::user()->role == 'admin' )
<a href="{{ Route('room.create') }}" class="btn-create">Создать зал</a>
<a href="{{ Route('booking.admin') }}" class="btn-create">Панель администратора</a>
@endif
</div>

<div class="rooms">
<h3>Залы</h3>
@foreach ( $rooms as $room )
<div class="room-card">
<span>{{ $room->name }}</span>
<span>{{ $room->price }} руб</span>
@if ( Auth::user()->role == 'admin' )
<form action="{{ Route('room.delete', $room) }}" method="POST" class="form-inline">
@csrf
@method('DELETE')
<button type="submit" class="btn-delete">Удалить</button>
</form>
@endif
</div>
@endforeach
</div>
</div>
</body>
</html>
