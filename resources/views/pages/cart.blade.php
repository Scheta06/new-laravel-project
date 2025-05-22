@extends('layouts.app')

@section('content')
    <main class="container main-cart flex gap40 full-width">
        <div class="photo-section column-display gap30 full-width">
            <a href="{{ route('catalog', ['type' => $type]) }}" class="goBack-link center border-radius4">
                Вернуться к каталогу
            </a>
            <div class="component-photo border-radius6">

            </div>
        </div>
        <div class="componentInfo-section column-display gap30">
            <div class="component-title center-row">
                @switch($type)
                    @case('processor')
                        {{ $title[0]->title }}
                        {{ Str::upper($data->vendor->title) }}
                        {{ Str::upper($data->processorGeneration->type) }}
                        {{ Str::upper($data->processorGeneration->title) }}
                        {{ Str::upper($data->title) }}
                    @break

                    @case('motherboard')
                        {{ $title[0]->title }}
                        {{ Str::upper($data->vendor->title) }}
                        {{ Str::upper($data->chipset->title) }}
                        {{ Str::upper($data->title) }}
                        {{ Str::upper($data->subtitle) }}
                    @break

                    @case('cooler')
                        {{ $title[0]->title }}
                    @break

                    @case('ram')
                        {{ $title[0]->title }}
                        {{ Str::upper($data->vendor->title) }}
                        {{ Str::upper($data->title) }}
                    @break

                    @default
                @endswitch

            </div>
            <div class="component-description border-radius6">
                {{ $data->description }}
            </div>
            <div class="component-title center-row">Характеристики</div>
            <div class="component-specification full-width border-radius6">
                <div class="specification-item grey-item">
                    <div class="specification-title">

                    </div>
                </div>
                <div class="specification-item dark-item">
                    <div class="specification-title">

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
