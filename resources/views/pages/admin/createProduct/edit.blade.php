@extends('layouts.admin')

@section('content')
    @if (session('status'))
        <div class="alert alert-success center border-radius6">
            {{ session('status') }}
        </div>
    @endif
    <main class="admin-create-product-show-container column-full-length full-height">
        <h1 class="capitalize-text">{{ $title[0]->title }}</h1>
        <form method="POST" action="{{ route('admin.createProduct.update', ['type' => $type, 'id' => $id]) }}"
            class="admin-create-product-show-form column-full-length gap30 full-height">
            @csrf
            <div class="flex gap20 flex-wrap">
                @foreach ($ArrayInfo as $key => $value)
                    @foreach ($value as $productInfo => $product)
                        <input type="text" class="input" name="{{ $productInfo }}" value="{{ $product }}" required>
                    @endforeach
                @endforeach

                @foreach ($selectInfo as $key => $value)
                    <select name="{{ $key }}" id="" class="input">
                        @foreach ($value as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
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

    {{-- @dd($selectInfo['processor_generation_id'][0]->title) --}}
    <script>
        const editBtn = document.querySelector('button.create-product-btn');

        editBtn.addEventListener('click', () => {
            confirm('Вы уверены');
        });
    </script>
@endsection
