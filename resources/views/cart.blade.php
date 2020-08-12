@extends('layouts.android')

@section('content')
    @if(Session::has('cart'))
        <div id="cart">
            <div class="text-right mb-2">
                <button class="btn btn-secondary" id="recount">Пересчитать</button>
                <a href="{{ route('clearCart') }}"><button class="btn btn-danger">Очистить корзину</button></a>
            </div>
            <cart-component></cart-component>

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
        </div>

    @endif
@endsection
