<header class="admin-header center-for-over-length full-width">
    <div class="logotype">
        <h1>Админ-панель</h1>
    </div>

    <button class="admin-choose-action-btn center-row">
        Выберите действие
    </button>

    <div class="admin-choose-action-list border-radius6 full-width">
        <ul class="column-display" style="gap: 10px">
            <li><a href="{{ route('admin.index') }}">Все товары</a></li>
            <li><a href="{{ route('admin.createProduct.index') }}">Создать новый товар</a></li>
            <li><a href="{{ route('profile') }}">Вернуться в профиль</a></li>
            <li>
                <a href="{{ route('logout') }}">
                    Выйти из аккаунта
                </a>
            </li>
        </ul>
    </div>

    <button class="mobile-admin-choose-action-btn center-row">
        <img src="{{ asset('storage/images/partials/List.png') }}" alt="">
    </button>

    <div class="mobile-admin-choose-action-list">
        <ul class="column-display" style="gap: 10px; font-weight: bold">
            <li><a href="{{ route('admin.index') }}">Все товары</a></li>
            <li><a href="{{ route('admin.createProduct.index') }}">Создать новый товар</a></li>
            <li><a href="{{ route('profile') }}">Вернуться в профиль</a></li>
            <li>
                <a href="{{ route('logout') }}">
                    Выйти из аккаунта
                </a>
            </li>
        </ul>
    </div>
</header>
