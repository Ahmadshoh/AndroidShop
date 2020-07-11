@extends('layouts.android')

@section('content')
    @if(Session::has('cart'))
        <div class="text-right mb-2">
            <button class="btn btn-secondary" id="recount">Пересчитать</button>
            <a href="{{ route('deleteAllFromCart') }}"><button class="btn btn-danger">Очистить корзину</button></a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="border">
                <tr class="thead border">
                    <th class="column-title">Изображение</th>
                    <th class="column-title">Товар</th>
                    <th class="column-title">Количество</th>
                    <th class="column-title">Цена</th>
                    <th class="column-title">Сумма</th>
                    <th class="column-title"></th>
                </tr>
                </thead>

                <tbody>
                @foreach($products as $product)
                <tr class="border">
                    <td class="border-bottom">
                        <a href="products/">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($product['item']['image']) }}" style="width: 100px;">
                        </a>
                    </td>
                    <td class="border-bottom">
                        <a href="products/" style="color: #9DAA56;">
                            {{ $product['item']['title'] }}
                        </a>
                    </td>
                    <td class="border-bottom">
                        <input type="number" class="itemCount" id="itemCount_{{ $product['item']['id'] }}" data-id="{{ $product['item']['id'] }}" data-current="{{ $product['qty'] }}" value="{{ $product['qty'] }}" min='1' style="width: 75px;">
                    </td>
                    <td class="border-bottom">{{ $product['item']['price'] }}</td>
                    <td class="border-bottom itemPrice" id="itemPrice_{{ $product['item']['id'] }}" value="{{ $product['item']['price'] }}">{{ $product['price'] }}</td>
                    <td class="border-bottom">
                        <a href="">
                            <button class="btn btn-danger">Удалить</button>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>

                <tfoot>
                <tr class="border">
                    <th class="column-title">Итого: {{ $totalQty }}</span> товара</th>
                    <th class="column-title"></th>
                    <th class="column-title"></th>
                    <th class="column-title"></th>
                    <th class="column-title"></th>
                    <th class="column-title" style="text-align: center;">Сумма: <span id="totalPrice">{{ $totalPrice }}</span> <span>TJS</span></th>
                </tr>
                </tfoot>
            </table>
        </div>

        @guest
            <div class="col-12 mt-5">
                <div class="alert alert-danger text-center">
                    <h5>Чтобы оформить заказ, сначало войдите или зарегистрируйтесь!</h5>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h3 class="text-center">Авторизация</h3>
                    @include('includes.login')
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h3 class="text-center">Регистрация</h3>
                    @include('includes.register')
                </div>
            </div>
        @else
            <h3 class="text-center" style="margin-top: 50px; margin-bottom: 50px;">Оформление заказа</h3>
            <form action="{{ route('order') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" required>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="name">Имя</label>
                        <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="phone">Контакный телефон</label>
                        <input type="tell" name="phone" id="phone" maxlength="13"  value="{{ Auth::user()->phone }}" class="form-control" required>
                    </div>
                    <div id="remove" class="form-group col-sm-12">
                        <label>Выберите способ доставки</label>
                        <select class="form-control" name="buying_type" id="buying-type">
                            <option>Самовызов</option>
                            <option>Доставка</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6" id="addressBlock" style="display: none;">
                        <label for="phone">Адрес</label>
                        <input type="text" name="address" id="address"  value="{{ old('address') }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="comment">Комментарии к заказу</label>
                        <textarea class="form-control" name="comment" id="comment" rows="7"></textarea>
                    </div>
                    <div class="col-12">
                        <input type="submit" class="btn btn-success" value="Оформить заказ">
                    </div>
                </div>
            </form>
        @endguest
    @else
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger text-center">
                    <h4>У вас нет товаров в корзине! Попробуйте добавить товар в корзину.</h4>
                </div>
            </div>
        </div>
    @endif
@endsection
