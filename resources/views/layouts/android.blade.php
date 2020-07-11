<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- <link rel="stylesheet" href="css/media.css"> -->
    <title>@yield('title')</title>
</head>

<body>
<div class="container">
    <section class="top-header">
        <div class="logo">
            <a href="{{ route('index') }}"><img src="{{ asset('/storage/logo/android.png') }}" alt=""></a>
        </div>
        <div class="phone">
            <h3><span>+992</span> 98 766 2004</h3>
            <h3 class="callback"><a href="/">Обратная связ</a></h3>
        </div>
        <div class="top-menu">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/">About</a></li>
                <li><a href="/">Products</a></li>
                <li><a href="/">Оплата</a></li>
                <li><a href="/">Contact</a></li>
                @auth
                    @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                        <li><a href="{{ route('admin') }}">Админка</a></li>
                    @endif
                @endauth
            </ul>
        </div>
    </section>
</div>
<section class="menu">
    <div class="container">
        <nav class="menu-items">
            <ul>
                <li class="category">
                    <button class="catalog" id="catalog">Каталог <i class="fas fa-bars"></i></button>
                    <ul>
                        @include('includes._category')
                    </ul>
                </li>
                <li class="search-li">
                    <input type="text" placeholder="Искать товар" class="search">
                    <button type="button" class="search-btn"><i class="fa fa-search"></i></button>
                </li>
                <li class="bookmark">
                    <a href="{{ route('bookmark') }}">
                        <button type="button" class="bookmark-btn"><i class="fa fa-heart"></i></button>
                    </a>
                </li>
                <li class="cabins">
                    <button class="menu-btn cabinet">Кабинет<i class="fas fa-user"></i></button>
                    <div class="cabins-items">
                        @auth
                            <div><a href="user/profile">Личный кабинет</a></div>
                            <div><a href="user/orders">Ваши заказы</a></div>
                            <div><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a></div>
                            <form action="{{ route('logout') }}" id="logout-form" style="display: none" method="post">@csrf</form>

                        @else
                            <div><a href="{{ route('login') }}">Войти</a></div>
                            <div><a href="{{ route('register') }}">Зарегистрироваться</a></div>
                        @endauth
                    </div>
                </li>
                <li class="cart">
                    <a href="{{ route('cart') }}">
                        <button class="menu-btn">
                            <span class="cart-count">{{ Session::has('cart') ? Session::get('cart')->totalQty : 0 }}</span>Корзина<i class="fa fa-cart-plus"></i>
                        </button>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</section>

<section class="content">
    <div class="container">

        @if ($errors->any())
        <div class="col-12">
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        </div>
        @endif
        @if (session()->has('success'))
            <div class="col-12">
                <div class="alert alert-success">
                    {{ session()->get('success') }}
{{--                    @foreach(session('success')->get('success') as $message)--}}
{{--                        {{ $message }}--}}
{{--                    @endforeach--}}
                </div>
            </div>
        @endif
        @yield('content')
    </div>
</section>

<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Товар добавлен в закладки</h4>
                <button class="close" data-dismiss="modal">Х</button>
            </div>
            <div class="modal-body">
                <div class="products-in-modal">
                    <div class="modal-items-img"><img src="img/-A30-32GB блк.png" alt=""></div>
                    <div class="modal-items-title">Samsung Galaxy A50</div>
                    <div class="modal-items price">1 x 1785 <span>TJS</span></div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#"><button class="main-btn" data-dismiss="modal">Закладки</button></a>
            </div>
        </div>
    </div>
</div>
<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h4>Кабинет покупателя</h4>
                <a href="">Войти</a>
                <a href="">Регистрация</a>
                <a href="">Заказы</a>
                <a href="">Товары в закладке</a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h4>Магазин</h4>
                <a href="">О магазине</a>
                <a href="">Возврат</a>
                <a href="">Условия рассрочки</a>
                <a href="">Доставка</a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h4>Контакты</h4>
                <span>г. Душанбе, ул. Фотех Ниёзи, 51</span>
                <a href="">+992488881111</a>
                <span>Пн—Пт: с 9.00 до 18.00</span>
                <span>Сб: с 10.00 до 16.00</span>
            </div>
        </div>

    </div>
</section>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
