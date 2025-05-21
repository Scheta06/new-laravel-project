<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/index.css', 'resources/css/styles/partials/header-footer.css', 'resources/css/styles/main.css', 'resources/css/styles/profile.css', 'resources/css/styles/auth.css', 'resources/js/active.js', 'resources/css/styles/catalog.css'])
</head>

<body class="column-full-length" style="gap: var(--gap100)">
    @include('partials.header')

    <div class="container center">
        @yield('content')
    </div>

    @include('partials.footer')
</body>

</html>
