@extends('layouts.admin')

@section('content')
@section('card-header')Заказы@endsection

<div class="card shadow mb-4">
    <div class="card-header py-3 badge-primary">
        <h6 class="m-0 font-weight-bold">Все заказы</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Заказчик</th>
                        <th>Количество товаров</th>
                        <th>Общая цена</th>
                        <th>Статус</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->getUser()->name }}</td>
                        <td>{{ $order->qty }}</td>
                        <td>{{ $order->totalPrice }}</td>
                        <td>
                            @if ($order->status == "Одобрено")
                                <span class="badge-success p-1" style="border-radius: 7px;">Выполнено</span>
                            @elseif($order->status == "Отказано")
                                <span class="badge-danger p-1" style="border-radius: 7px;">Отказано</span>
                            @else
                                <span class="badge-secondary p-1" style="border-radius: 7px;">Обрабатывается</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.product.destroy', $order) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <a href="{{ route('admin.order.show', $order) }}"><i class="fa fa-eye"></i></a>
{{--                                <button type="submit" class="btn "><i class="fa fa-trash"></i></button>--}}
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center"><h3>Данные отсутсвуют</h3></td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="6">
                        <ul class="pagination pull-right">
                            {{ $orders->links() }}
                        </ul>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
