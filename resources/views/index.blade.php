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
            <div class="owl-carousel owl-theme">
                @foreach($sliders as $slider)
                    <div><img src="{{ asset($slider->image_path) }}"></div>
                @endforeach
            </div>

            <div class="row">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product">
                            <a href="{{ route('addToBookmark', $product->id) }}" class="add_to_bookmark"><button><i class="fa fa-heart"></i></button></a>
                            <div class="product-img">
                                <a href="{{ route('product', [$product->parentCategory($product->category())->alias, $product->category()->alias, $product->alias]) }}">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}">
                                </a>
                            </div>
                            <div class="product-review">
                                <p class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</p>
                            </div>
                            <div class="product-title">
                                <a href="{{ route('product', [$product->parentCategory($product->category())->alias, $product->category()->alias, $product->alias]) }}">
                                    <h3>{{ $product->title }}</h3>
                                </a>
                            </div>
                            <div class="product-price">
                                <p>Цена: {{ $product->price }} <span>TJS</span></p>
                            </div>
                            <div class="add-to-cart">
                                <a href="{{ route('addToCart', $product->id) }}"><button class="main-btn">Купить наличнимы</button></a>
                                <a href=""><button class="main-btn">Купить в рассрочку</button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12 mt-5">
                    <ul class="pagination pull-right">
                        {{ $products->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
