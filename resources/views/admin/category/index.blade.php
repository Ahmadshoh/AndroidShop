@extends('layouts.admin')

@section('content')
    @section('card-title')Категории@endsection
    <div class="card shadow mb-4">
        <div class="card-header py-3 badge-primary">
            <h6 class="m-0 font-weight-bold">Все категории</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-12">
                    <a href="{{ route('admin.category.create') }}"><button class="btn btn-success">Добавить</button></a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <th style="width: 75px;" class="text-center">№(id)</th>
                    <th>Название</th>
                    <th>Ссылка</th>
                    <th>Родительская категория</th>
                    <th>Действие</th>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td class="text-center">{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->alias }}</td>
                            <td>{{ $category->parent_id }}</td>
                            <td>
                                <form action="{{ route('admin.category.destroy', $category) }}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    <a href="{{ route('admin.category.edit', $category) }}"><i class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn "><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center"><h3>Данные отсутсвуют</h3></td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5">
                            <ul class="pagination pull-right">
                                {{ $categories->links() }}
                            </ul>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
@endsection
