@extends('layouts.admin')

@section('content')
@section('card-header')Пользователи@endsection

<div class="card shadow mb-4">
    <div class="card-header py-3 badge-primary">
        <h6 class="m-0 font-weight-bold">Все пользователи</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Телефон</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            <form action="{{ route('admin.user.destroy', $user) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <a href="{{ route('admin.user.edit', $user) }}"><i class="fa fa-edit"></i></a>
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
                            {{ $users->links() }}
                        </ul>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
