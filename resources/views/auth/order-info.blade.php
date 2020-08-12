@extends('layouts.android')

@section('content')
    @if(!empty($orderItems))
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
                @foreach($orderItems as $item)
                    <tr class="border">
                        <td class="border-bottom">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($item->getProduct($item->id)->image) }}" style="width: 70%">
                        </td>
                        <td class="border-bottom">{{ $item->getProduct($item->id)->title }}</td>
                        <td class="border-bottom">{{ $item->getProduct($item->id)->price }}</td>
                        <td class="border-bottom">{{ $item->qty }}</td>
                        <td class="border-bottom">{{ $item->total_price }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-danger">
            <h4>Такой заказ не найден</h4>
        </div>
    @endif

    <div class="col-12 text-right">
        <a href="{{ route('user.orders') }}"><button class="btn btn-danger">Вернуться на страницу заказов</button></a>
    </div>
@endsection
