@extends('layouts.admin')

@section('content')
@section('card-title')Продукты@endsection
<div class="card shadow mb-4">
    <div class="card-header py-3 badge-primary">
        <h6 class="m-0 font-weight-bold">Добавить товар</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.product._form')
        </form>
    </div>
</div>
@endsection
