@extends('layouts.android')
@section('title')Главная страница@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="filters">
                <div id="accordion">
                    <div class="card nav-item">
                        <a class="card-header nav-link collapsed" data-toggle="collapse"
                           data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Сим-карта
                        </a>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordion">
                            <div class="card-body">
                                <div class="toggle-button">
                                    <input id="visible" name="visible" type="checkbox">
                                    <label for="visible"
                                           style="height: 20px;width: 20px;background: transparent; font-size: 22px;">
                                        1 </label>
                                    <div class="toggle-button__icon"></div>
                                </div>
                                <div class="toggle-button">
                                    <input id="visible" name="visible" type="checkbox">
                                    <label for="visible"
                                           style="height: 20px;width: 20px;background: transparent; font-size: 22px;">
                                        2 </label>
                                    <div class="toggle-button__icon"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9">
            @if(isset($products))
                <h3 class="mt-1 mb-5">{{ $child_category->title }}</h3>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="product">
                                <a href="" class="add_to_bookmark"><button><i class="fa fa-heart"></i></button></a>
                                <div class="product-img">
                                    <a href="{{ route('product', [$parent_category->alias, $child_category->alias, $product->alias]) }}">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}">
                                    </a>
                                </div>
                                <div class="product-review">
                                    <p class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</p>
                                </div>
                                <div class="product-title">
                                    <a href="{{ route('product', [$parent_category->alias, $child_category->alias, $product->alias]) }}">
                                        <h3>{{ $product->title }}</h3>
                                    </a>
                                </div>
                                <div class="product-price">
                                    <p>Цена: {{ $product->price }} <span>TJS</span></p>
                                </div>
                                <div class="add-to-cart">
                                    <a href="{{ route('addToCart', $product->id) }}"><button class="main-btn">Купить наличнимы</button></a>
                                    <a href="{{ $product->alif_link }}"><button class="main-btn">Купить в рассрочку</button></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                @foreach($category_children as $category)

                    <div class="row">
                        <div class="col-8">
                            <h3 class="mt-1 mb-5">{{ $category->title }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('category_child', [$parent_category->alias, $category->alias]) }}">Все товары</a>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($category->getProducts()->paginate(6) as $product)
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="product">
                                    <a href="" class="add_to_bookmark"><button><i class="fa fa-heart"></i></button></a>
                                    <div class="product-img">
                                        <a href="{{ route('product', [$parent_category->alias, $category->alias, $product->alias]) }}">
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}">
                                        </a>
                                    </div>
                                    <div class="product-review">
                                        <p class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</p>
                                    </div>
                                    <div class="product-title">
                                        <a href="{{ route('product', [$parent_category->alias, $category->alias, $product->alias]) }}">
                                            <h3>{{ $product->title }}</h3>
                                        </a>
                                    </div>
                                    <div class="product-price">
                                        <p>Цена: {{ $product->price }} <span>TJS</span></p>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="{{ route('addToCart', $product->id) }}"><button class="main-btn">Купить наличнимы</button></a>
                                        <a href="{{ $product->alif_link }}"><button class="main-btn">Купить в рассрочку</button></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
