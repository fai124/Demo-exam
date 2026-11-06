<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Конференции.РФ</title>
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
        <div class="welcome">
            <h2>Добро пожаловать, {{ Auth::user()->FIO }}!</h2>
            <p>Выберите помещение для проведения конференции и оформите заявку на бронирование.</p>

            <a href="{{ route('booking.create') }}" class="btn-create">Создать заявку</a>
            <a href="{{ route('booking.my') }}" class="btn-create">Мои заявки</a>

            @if(Auth::user()->login === 'Conf2027')
                <a href="{{ route('room.create') }}" class="btn-create">Создать зал</a>
                <a href="{{ route('booking.admin') }}" class="btn-create">Панель администратора</a>
            @endif
        </div>

        <div class="rooms">
            <h3>Залы</h3>
            @foreach($rooms as $room)
                <div class="room-card">
                    <span>{{ $room->name }}</span>
                    <span>{{ $room->price }} ₽</span>
                    @if(Auth::user()->login === 'Conf2027')
                        <form action="{{ route('room.destroy', $room) }}" method="POST" style="display:inline;">
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
