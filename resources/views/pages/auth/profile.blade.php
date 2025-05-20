@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success center border-radius6">
            {{ session('status') }}
        </div>
    @endif
    <main class="profile for-over-length gap30 full-width">
        <div class="user-action-section column-display gap30 border-radius10 full-width">
            <ul class="column-display gap30">
                <li>
                    <h2>
                        Управление аккаунтом
                    </h2>
                </li>
                <li>
                    <a href="" class="center-row gap15">
                        <img src="{{ asset('storage/images/partials/Circuitry.png') }}">
                        <h3>
                            Мои сборки
                        </h3>
                    </a>
                </li>
                <li>
                    <a href="{{ route('change-passwordForm') }}" class="center-row gap15">
                        <img src="{{ asset('storage/images/partials/Nut.png') }}">
                        <h3>
                            Сменить пароль
                        </h3>
                    </a>
                </li>
                @if (Auth::user()->role === 'admin')
                    <li>
                        <a href="{{ route('admin.index') }}" class="center-row gap15">
                            <img src="{{ asset('storage/images/partials/FolderSimplePlus.png') }}">
                            <h3>
                                Админ-панель
                            </h3>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('logout') }}" class="center-row gap15">
                        <img src="{{ asset('storage/images/partials/SignOut.png') }}">
                        <h3>
                            Выйти из аккаунта
                        </h3>
                    </a>
                </li>
            </ul>
        </div>
        <div class="action-info column-display gap20 full-width">
            <h2>Добро пожаловать, {{ $userData->name }}</h2>
            <div class="user-info-section column-display gap30 border-radius10">
                @foreach ($userInfo as $key => $value)
                    <div class="info-row column-display">
                        <div class="for-over-length">
                            <h3>{{ $key }}:</h3>
                            <h3>{{ $value }}</h3>
                        </div>
                        <div class="row-line" style="margin-top: 5px"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
