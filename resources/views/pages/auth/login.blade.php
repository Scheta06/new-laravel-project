<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/index.css', 'resources/css/styles/auth.css'])
</head>

<body class="center">
    <main class="container center full-width">
        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="alert-danger center border-radius6">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}"
            class="auth-container column-display gap30 border-radius10 full-width">
            @csrf
            <h1>Авторизация</h1>
            <div class="auth-input-section column-display gap15 full-width">
                <input type="text" class="input" placeholder="E-mail" name="email" value="{{ old('email') }}" required>
                <input type="password" class="input" placeholder="Пароль" name="password" value="{{ old('password') }}" required>
            </div>
            <button type="submit" class="primary full-width">
                <h2>Войти</h2>
            </button>
            <a href="{{ route('registerForm') }}">
                <h4>
                    <span>Нет аккаунта?</span>
                    Перейти к регистрации
                </h4>
            </a>
        </form>
    </main>
</body>

</html>
