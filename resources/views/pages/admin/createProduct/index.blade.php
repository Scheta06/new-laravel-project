@extends('layouts.admin')

@section('content')
    @if (session('status'))
        <div class="alert alert-success center border-radius6">
            {{ session('status') }}
        </div>
    @endif
    <main class="admin-create-product-choose-category full-width">
        <h2>Выберите категорию</h2>
        <div class="admin-category-list for-over-length flex-wrap gap40">
            @foreach ($categories as $item)
                <a href="{{ route('admin.createProduct.show', ['type' => $item->type]) }}"
                    class="admin-category-item border-radius6 full-width"></a>
            @endforeach
        </div>
    </main>
@endsection
