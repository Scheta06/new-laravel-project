@extends('layouts.admin')

@section('content')
    @if (session('status'))
        <div class="alert alert-success center border-radius6">
            {{ session('status') }}
        </div>
    @endif
    <main class="admin-create-product-choose-category full-width">
        <form action="{{ route('admin.createProduct.index') }}" method="GET">
            @csrf
            <h2>Все товары</h2>
            <select id="categoryFilter" class="input" style="margin-top: 15px">
                <option value="">Выберите категорию</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>
            <div class="admin-all-product-section column-display gap20">
                @foreach ($allProducts as $productType => $products)
                    @foreach ($products as $product)
                        <div class="admin-product-block center-for-over-length border-radius6"
                            data-category="{{ $product->category_id }}">
                            @switch($product->category->type)
                                @case('processor')
                                    <div class="container">
                                        <span class="capitalize-text">
                                            {{ $product->category->title }}
                                        </span> -
                                        <span class="upper-text">
                                            {{ $product->vendor->title }}
                                            {{ $product->processorGeneration->type }}
                                            {{ $product->title }}
                                        </span>
                                    </div>
                                @break

                                @case('motherboard')
                                    <div class="container">
                                        <span class="capitalize-text">
                                            {{ $product->category->title }} -
                                        </span>
                                        <span class="upper-text">
                                            {{ $product->vendor->title }} {{ $product->chipset->title }}
                                            {{ $product->subtitle }}
                                        </span>
                                    </div>
                                @break

                                @case('cooler')
                                    <div class="container">
                                        <span class="capitalize-text">
                                            {{ $product->category->title }} -
                                        </span>
                                        <span class="upper-text">
                                            {{ $product->vendor->title }}
                                            {{ $product->title }}
                                        </span>
                                    </div>
                                @break

                                @case('videocard')
                                    <div class="container">
                                        <span class="capitalize-text">
                                            {{ $product->category->title }} -
                                        </span>
                                        <span class="upper-text">{{ $product->vendor->title }}</span>
                                        <span class="capitalize-text">
                                            {{ $product->title }}
                                        </span>
                                    </div>
                                @break

                                @case('storage')
                                    <div class="container">
                                        <span class="capitalize-text">{{ $product->category->title }} - </span>
                                        <span class="upper-text">
                                            {{ $product->vendor->title }}
                                            {{ $product->title }}
                                        </span>
                                    </div>
                                @break

                                @case('ram')
                                    <div class="container">
                                        <span class="capitalize-text">
                                            {{ $product->category->title }} -
                                            {{ $product->vendor->title }}
                                            {{ $product->title }}
                                        </span>

                                    </div>
                                @break

                                @case('psu')
                                    <div class="container">
                                        <span class="capitalize-text">
                                            {{ $product->category->title }}
                                        </span> -
                                        <span class="upper-text">
                                            {{ $product->vendor->title }}
                                            {{ $product->title }}
                                        </span>
                                    </div>
                                @break

                                @case('chassis')
                                    <div class="container">
                                        <span class="capitalize-text">
                                            {{ $product->category->title }} -
                                            {{ $product->vendor->title }}</span>
                                        <span class="upper-text">
                                            {{ $product->title }}
                                        </span>
                                    </div>
                                @break

                                @default
                            @endswitch

                            <div class="container center-for-over-length gap30">
                                <a
                                    href="{{ route('admin.createProduct.edit', ['type' => $product->category->type, 'id' => $product->id]) }}">
                                    <img src="{{ asset('storage/images/partials/PencilLine.svg') }}">
                                </a>
                                <form
                                    action="{{ route('admin.createProduct.destroy', ['type' => $product->category->type, 'id' => $product->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <img src="{{ asset('storage/images/partials/DeleteBtn.svg') }}">
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
    </main>
    </form>

    <script>
        document.getElementById('categoryFilter').addEventListener('change', function() {
            const categoryId = this.value;
            const productItems = document.querySelectorAll('.admin-product-block');

            productItems.forEach(item => {
                if (!categoryId || item.dataset.category === categoryId) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
@endsection
