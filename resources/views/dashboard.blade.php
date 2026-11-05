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
        </div>
    </div>
</body>
</html>
