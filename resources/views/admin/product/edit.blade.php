@extends('layouts.admin')

@section('content')
    @section('card-title')Товары@endsection
    <div class="card shadow mb-4">
        <div class="card-header py-3 badge-primary">
            <h6 class="m-0 font-weight-bold">Изменить товар</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.product.update', $product) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="put">
                @csrf
                @include('admin.product._form')
            </form>
        </div>
    </div>
@endsection
