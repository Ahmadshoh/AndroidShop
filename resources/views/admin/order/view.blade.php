@extends('layouts.admin')

@section('content')
@section('card-title')Заказы@endsection
<div class="card shadow mb-4">
    <div class="card-header py-3 badge-primary">
        <h6 class="m-0 font-weight-bold">Заказ №{{ $order->id }}</h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="border">
                    <tr class="thead border" style="background-color: rgba(0, 0, 0, 0.05);">
                        <th class="column-title" style="width: 15%;">Изображение</th>
                        <th class="column-title">Название продукта</th>
                        <th class="column-title">Цена</th>
                        <th class="column-title">Количетсво заказа</th>
                        <th class="column-title">Общая сумма</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($order->getItems() as $item)
                    <tr class="border">
                        <td class="border-bottom">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($item->getProduct()->image) }}" style="width: 70%">
                        </td>
                        <td class="border-bottom">{{ $item->getProduct()->title }}</td>
                        <td class="border-bottom">{{ $item->getProduct()->price }}</td>
                        <td class="border-bottom">{{ $item->qty }}</td>
                        <td class="border-bottom">{{ $item->total_price }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12 text-right">
            <a href="{{ route('admin.order.index') }}"><button class="btn btn-outline-secondary">Вернутсья на страницу заказов</button></a>
            @if ($order->status == 'Обрабатываеться')
                <a href="{{ route('admin.order.edit', [$order, "status=Отказано"]) }}"><button class="btn btn-danger">Отказать</button></a>
                <a href="{{ route('admin.order.edit', [$order, "status=Одобрено"]) }}"><button class="btn btn-success">Одобрить</button></a>
            @else
                <a href="{{ route('admin.order.edit', [$order, "status=Обрабатываеться"]) }}"><button class="btn btn-dark">Вернуть на доработку</button></a>
            @endif
        </div>
    </div>
</div>
@endsection
