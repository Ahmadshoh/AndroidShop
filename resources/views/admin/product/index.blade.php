@extends('layouts.admin')

@section('content')
    @section('card-header')Продукты@endsection

    <div class="card shadow mb-4">
        <div class="card-header py-3 badge-primary">
            <h6 class="m-0 font-weight-bold">Все продукты</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-12">
                    <a href="{{ route('admin.product.create') }}"><button class="btn btn-success">Добавить</button></a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Цена</th>
                            <th>Статус</th>
                            <th>Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->category_id }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->visible }}</td>
                                <td>
                                    <form action="{{ route('admin.product.destroy', $product) }}" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        @csrf
                                        <a href="{{ route('admin.product.edit', $product) }}"><i class="fa fa-edit"></i></a>
                                        <button type="submit" class="btn "><i class="fa fa-trash"></i></button>
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
                                    {{ $products->links() }}
                                </ul>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
