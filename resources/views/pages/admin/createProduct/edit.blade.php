@extends('layouts.admin')

@section('content')
    @if (session('status'))
        <div class="alert alert-success center border-radius6">
            {{ session('status') }}
        </div>
    @endif
    <main class="admin-create-product-show-container column-full-length full-height">
        <h1 class="capitalize-text">
            {{ $title[0]->title }}

            {{ $componentInfo->vendor->title }}
            @if ($title[0]->title === 'процессор')
                {{ $componentInfo->processorGeneration->type }}
                {{ $componentInfo->processorGeneration->title }}
            @elseif ($title[0]->title === 'материнская плата')
                {{ $componentInfo->chipset->title }}
                {{ $componentInfo->subtitle }}
            @endif
            {{ $componentInfo->title }}
        </h1>
        <form method="PATCH" action="{{ route('admin.createProduct.update', ['type' => $type, 'id' => $id]) }}"
            class="admin-create-product-show-form column-full-length gap30 full-height">
            @csrf
            <div class="flex gap20 flex-wrap">
                @foreach ($ArrayInfo as $key => $value)
                    @foreach ($value as $productInfo => $product)
                        <input type="text" class="input" name="{{ $productInfo }}" value="{{ $product }}" required>
                    @endforeach
                @endforeach


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
