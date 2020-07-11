@extends('layouts.admin')

@section('content')
    @section('card-title')Категории@endsection
    <div class="card shadow mb-4">
        <div class="card-header py-3 badge-primary">
            <h6 class="m-0 font-weight-bold">Изменить категорию</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.category.update', $category) }}" method="POST">
                <input type="hidden" name="_method" value="put">
                @csrf
                @include('admin.category._form')
            </form>
        </div>
    </div>
@endsection
