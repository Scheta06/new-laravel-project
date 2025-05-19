@extends('layouts.admin')

@section('content')
    <main class="admin-create-product-show-container container column-full-length full-height">
        <h1>Новый {{ $title[0]->title }}</h1>
        <form method="POST" action="{{ route('admin.createProduct.create', ['type' => $type]) }}"
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
                                <option value="{{ $value2->id }}">{{ $value2->type }} {{ $value2->title }}</option>
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
                <h2>Создать</h2>
            </button>
        </form>
    </main>
@endsection
