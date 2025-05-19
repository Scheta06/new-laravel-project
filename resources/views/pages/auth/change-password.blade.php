<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change-password</title>
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
        <form method="POST" action="{{ route('change-password') }}"
            class="auth-container column-display gap30 border-radius10 full-width">
            @csrf
            <h1>Смена пароля</h1>
            <div class="auth-input-section column-display gap15 full-width">
                <input type="password" class="input" placeholder="Текущий пароль" name="current_password" required>
                <input type="password" class="input" placeholder="Новый пароль" name="new_password" required>
                <input type="password" class="input" placeholder="Повтор нового пароля" name="new_password_confirmation" required>
            </div>
            <button type="submit" class="primary full-width">
                <h2>Изменить</h2>
            </button>
            <a href="{{ route('profile') }}">
                <h4>
                    <span>Вернуться в профиль</span>
                </h4>
            </a>
        </form>
    </main>
</body>

</html>
