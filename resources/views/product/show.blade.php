@extends('layouts.app')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
    <div class="container">
        <div class="product">
            <img src="{{ asset($product->image) }}" alt="" class="product-img">
            <div class="product__content-header text-center">
                <div class="product__name">
                    {{ $product->name }}
                </div>
                <div class="product__price">
                    ¥{{ number_format($product->price) }}
                </div>
            </div>
            {{ $product->description }}
            <form method="POST" action="{{ route('line_item.create') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}" />
                <div class="product__quantity">
                    <input type="number" name="quantity" min="1" value="1" required>
                </div>
                <div class="product__btn-add-cart">
                    <button class="btn btn-outline-secondary">カートに追加する</button>
                </div>
            </form>
        </div>
        <a href="{{ route('product.index') }}">TOPへ戻る</a>
    </div>
@endsection
