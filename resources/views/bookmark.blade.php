@extends('layouts.android')

@section('content')
    @if(Session::has('bookmark'))
        <div class="text-left mb-5">
            <a href="{{ route('clearBookmark') }}"><button class="btn btn-danger">Очистить закладку</button></a>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="product">
                        <div class="delete-from-bookmark">
                            <a href="{{ route('deleteFromBookmark', $product->id) }}" class="removeFromBookmark">
                                <span>x</span> Удалить
                            </a>
                        </div>
                        <div class="product-img">
                            <a href="">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}">
                            </a>
                        </div>
                        <div class="product-review">
                            <p class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</p>
                        </div>
                        <div class="product-title">
                            <a href="product/">
                                <h3>{{ $product->title }}</h3>
                            </a>
                        </div>
                        <div class="product-price">
                            <p>Цена: {{ $product->price }} <span>TJS</span></p>
                        </div>
                        <div class="add-to-cart">
                            <a id="addToCart" href="#" class="addToCart" data-id="">
                                <button class="main-btn">Купить наличнимы</button>
                            </a>
                            <a href="" target="_blank">
                                <button class="main-btn">Купить в рассрочку</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger text-center">
                    <h4>У вас нет товаров в закладке! Попробуйте добавить товар в закладку.</h4>
                </div>
            </div>
        </div>
    @endif
@endsection
