@extends('layouts.admin')

@section('content')
    @if (session('status'))
        <div class="alert alert-success center border-radius6">
            {{ session('status') }}
        </div>
    @endif
    <main class="admin-create-product-show-container container column-full-length full-height">
        <h1>Новый {{ $title[0]->title }}</h1>
        <form method="POST" action="{{ route('admin.createProduct.update', ['type' => $type, 'id' => $id]) }}"
            class="admin-create-product-show-form column-full-length gap30 full-height">
            @csrf
            <div class="container flex gap20 flex-wrap">
                @foreach ($specificationArray[$type] as $key => $value)
                    <input type="text" class="input" placeholder="{{ $value }}" name="{{ $key }}" required>
                @endforeach
                @foreach ($data as $key => $value)
                    <select name="{{ $key }}" required class="input">
                        @foreach ($value as $key1 => $value1)
                            <option value="">Выберите {{ $key1 }}</option>
                            @foreach ($value1 as $key2 => $value2)
                                <option value="{{ old($value2->id) }}">{{ $value2->type }} {{ $value2->title }}</option>
                            @endforeach
                        @endforeach
                    </select>
                @endforeach
                <select name="category_id" class="input">
                    <option value="">Выберите категорию компонента</option>
                    <option value="{{ $title[0]->id }}">{{ $title[0]->title }}</option>
                </select>
            </div>
            <button type="submit" class="create-product-btn border-radius6 full-width">
                <h2>Изменить</h2>
            </button>
        </form>
    </main>
    <script>
        const editBtn = document.querySelector('button.create-product-btn');

        editBtn.addEventListener('click', () => {
            confirm('Вы уверены');
        });
    </script>
@endsection
