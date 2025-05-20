<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/styles/admin.css', 'resources/js/active.js', 'resources/css/index.css',])
</head>

<body id="admin-body">
    @include('partials.admin-header')

    <div class="container center">
        @yield('content')
    </div>
</body>

</html>
