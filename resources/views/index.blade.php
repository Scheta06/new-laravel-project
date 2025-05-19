@extends('layouts.app')

@section('content')
    <main class="main border-radius10 full-width">
        <form action="" class="form-control">
            <div class="upper-main for-over-length flex-wrap">
                <div class="photo border-radius6 full-width full-height"></div>
                <div class="build-section column-display full-width">
                    <h2>Данные о сборке</h2>
                    <div class="build-input-section column-display gap20 full-width">
                        <div class="build-input">
                            <input type="text" placeholder="Название" class="input">
                        </div>
                        <div class="build-input">
                            <input type="text" placeholder="Описание (необязательно)" class="input">
                        </div>
                    </div>
                    <button type="submit" class="primary">
                        <h2>Сохранить</h2>
                    </button>
                </div>
            </div>
            <div class="lower-main for-over-length gap20 flex-wrap">
                @foreach ($categories as $item)
                    <a href="{{ route('catalog', ['type' => $item->type]) }}" class="choose-component border-radius6 center-for-over-length full-width">
                        <h4>{{ $item->title }}</h4>
                        <img src="{{ asset('storage/images/partials/plus.png') }}">
                    </a>
                @endforeach
            </div>
        </form>
    </main>
@endsection
