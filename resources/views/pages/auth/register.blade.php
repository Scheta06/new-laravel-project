<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite(['resources/css/index.css', 'resources/css/styles/auth.css'])
</head>

<body class="center">
    <main class="container center full-width">
        @if ($errors->any())
            <div class="alert alert-danger center border-radius6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}" class="auth-container column-display gap30 border-radius10 full-width">
            @csrf
            <h1>Регистрация</h1>
            <div class="auth-input-section column-display gap15 full-width">
                <input type="text" class="input" placeholder="Логин" name="name" required>
                <input type="text" class="input" placeholder="E-mail" name="email" required>
                <input type="password" class="input" placeholder="Пароль" name="password" required>
                <input type="password" class="input" placeholder="Повтор пароля" name="password_confirmation" required>
            </div>
            <button type="submit" class="primary full-width">
                <h2>Зарегистрироваться</h2>
            </button>
            <a href="{{ route('loginForm') }}">
                <h4>
                    <span>Уже есть аккаунт?</span>
                    Перейти к авторизации
                </h4>
            </a>
        </form>
    </main>
</body>

</html>
