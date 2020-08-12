@extends('layouts.android')

@section('content')
    @if(!empty($orders))
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="border">
                <tr class="thead border" style="background-color: rgba(0, 0, 0, 0.05);">
                    <th class="column-title">Кол. продуктов</th>
                    <th class="column-title">Общая сумма</th>
                    <th class="column-title">Способ доставки</th>
                    <th class="column-title">Статус</th>
                    <th class="column-title">Дата и время заказа</th>
                    <th class="column-title"></th>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $order)
                <tr class="border">
                    <td class="border-bottom">{{ $order->qty }}</td>
                    <td class="border-bottom">{{ $order->totalPrice }}</td>
                    <td class="border-bottom">{{ $order->buying_type }}</td>
                    <td class="border-bottom">
                        @if ($order->status == "Выполнено")
                            <span class="badge-success p-1" style="border-radius: 7px;">Выполнено</span>
                        @elseif($order->status == "Отказано")
                            <span class="badge-danger p-1" style="border-radius: 7px;">Отказано</span>
                        @else
                            <span class="badge-secondary p-1" style="border-radius: 7px;">Обрабатывается</span>
                        @endif
                    </td>
                    <td class="border-bottom">{{ $order->created_at }}</td>
                    <td class="border-bottom"><a href="{{ route('user.order_info', $order) }}"><button class="btn btn-outline-secondary">Посмотреть</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="alert alert-danger">
        <h4>Заказы не найдены</h4>
    </div>
    @endif
@endsection
