@extends('layouts.app')

@section('content')
    <main class="container catalog-container flex gap40 full-width">
        <div class="search-section border-radius10 column-display gap20 full-width">
            <h2>Поиск</h2>
            <div class="column-display gap10">
                <input type="text" class="input" placeholder="Название компонента">
                <select name="vendor_id" id="" class="input">
                    <option value="">Выберите производителя</option>
                    @foreach ($vendor as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="products-section column-display gap30 full-width">
            <h2>{{ $title }}</h2>
            <div class="product-container column-display gap20">
                @foreach ($allProductCase as $key => $value)
                    <div class="product-block center-for-over-length gap20 border-radius6 full-width">
                        <div class="flex gap20 full-width full-heigth">
                            <div class="product-photo border-radius6 full-width full-height">

                            </div>
                            @switch($type)
                                @case('processor')
                                    <div class="product-description center-for-over-length border-radius6 full-height full-width upper-text">
                                        {{ $value->vendor->title }}
                                        {{ $value->processorGeneration->type }}
                                        {{ $value->processorGeneration->title }}
                                        {{ $value->title }}
                                        [{{ $value->socket->title }}, {{ $value->cores }} * {{ $value->base_frequency }}]
                                    </div>
                                @break

                                @case('motherboard')
                                    <div class="product-description center-for-over-length border-radius6 full-height full-width upper-text">
                                        {{ $value->vendor->title }}
                                        {{ $value->chipset->title }}
                                        {{ $value->title }}
                                        {{ $value->subtitle }}
                                        [{{ $value->socket->title }}, ]
                                    </div>
                                @break

                                @case('ram')
                                    <div class="product-description center-for-over-length border-radius6 full-height full-width upper-text">
                                        {{ $value->vendor->title }}
                                        {{ $value->title }}
                                        {{ $value->subtitle }}
                                        [{{ $value->cores }} * {{ $value->base_frequency }}]
                                    </div>
                                @break

                                @default
                            @endswitch

                        </div>
                        <div class="product-action-section column-display gap20 full-width">
                            <div class="product-action-link center border-radius6 full-width">
                                <a href="#">
                                    Подробнее
                                </a>
                            </div>
                            <div class="product-action-link center border-radius6 full-width">
                                <a href="#">
                                    Добавить
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    {{-- @dd($allProductCase[0]) --}}
@endsection
