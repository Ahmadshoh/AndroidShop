@extends('layouts.android')
@section('title')Главная страница@endsection

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('category', $parent_category_alias) }}">{{ $parent_category_alias }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category', [$parent_category_alias, $child_category_alias]) }}">{{ $child_category_alias }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->alias }}</li>
                </ol>
            </nav>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 img-block">
            <div class="product_product-img">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" alt="">
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 info-block">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <h4 class="product_product-title">{{ $product->title }}</h4><br>
                    <p class="product_product-price">Цена: <span class="price">{{ $product->price }}</span> <span class="tjs">TJS</span></p>
                    <p class="product_product-manufacturer">
                        Производитель:
                        <span class="brand-name">
                        <a href="">{{ $product->category()->title }}</a>
                    </span>
                    </p>

                    <div class="text-left mb-3">

                    </div>

                    <div class="text-left mb-3 mt-5">
                        <form action="{{ route('addToCart', $product->id) }}">
                            <div class="row">
                                <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <label for="qty">Количество</label>
                                    <input type="number" id="qty" name="qty" class="form-control mr-3" value="1" min="1">
                                </div>
                                <div class="form-group col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <label for="color">Цвет</label>
                                    <select name="color" id="color" class="form-control">
                                        <option value="Red">Red</option>
                                        <option value="Red">Red</option>
                                        <option value="Red">Red</option>
                                    </select>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-success" value="Купить">
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h4 class="info-title">Полезные информации</h4><br>
                    <a href="#" class="product-terms mb-5">
                        <i class="fa fa-align-justify" style="font-size: 18px;">Условия рассрочки</i>
                    </a>
                    <a href="#" class="product-terms mt-5">
                        <i class="fa fa-mobile" style="font-size: 18px;">Условия доставки</i>
                    </a>
                </div>
            </div>

            <div class="bottom-block mt-5">
                <a href="{{ route('addToBookmark', $product->id) }}" class="addToBookmark mr-5">
                    <i class="fa fa-heart"></i>
                    <span>Добавить в закладку</span>
                </a>
                <a href="{{ $product->alif_link }}>" target="_blank">
                    <i class="fa fa-cart-plus"></i>
                    <span>Купить в рассрочку</span>
                </a>
            </div>
        </div>

        <div class="product-infos">
            <div class="tabs">
                <span class="tab">Описание</span>
                <span class="tab">Характеристики</span>
            </div>
            <div class="tab_content">
                <div class="tab_item col-12">
                    {!! $product->description !!}
                </div>
                <div class="tab_item">
                    {{--                <div class="table-responsive col-12">--}}
                    {{--                    <table class="table col-12">--}}
                    {{--                        <?php foreach($groups as $group => $items): ?>--}}
                    {{--                        <thead>--}}
                    {{--                        <tr>--}}
                    {{--                            <th colspan='4' class='text-left'><?=$group?></th>--}}
                    {{--                        </tr>--}}
                    {{--                        </thead>--}}
                    {{--                        <?php foreach ($items as $id => $value): ?>--}}
                    {{--                        <tbody>--}}
                    {{--                        <tr>--}}
                    {{--                            <td class="text-left" colspan="2"><?=$value["charc_title"]?></td>--}}
                    {{--                            <td class="text-left" colspan="2"><?=$value["value"]?></td>--}}
                    {{--                        </tr>--}}
                    {{--                        </tbody>--}}
                    {{--                        <?php endforeach; ?>--}}
                    {{--                        <?php endforeach; ?>--}}
                    {{--                    </table>--}}
                    {{--                </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
