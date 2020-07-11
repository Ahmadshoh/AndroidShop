@extends('layouts.admin')

@section('content')
    @section('card-title')Категории@endsection
    <div class="card shadow mb-4">
        <div class="card-header py-3 badge-primary">
            <h6 class="m-0 font-weight-bold">Добавить категорию</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.category.store') }}" method="POST">
                @csrf
                @include('admin.category._form')
            </form>
        </div>
    </div>
@endsection
