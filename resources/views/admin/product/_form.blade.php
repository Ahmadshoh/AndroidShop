<div class="form-group">
    <label for="title">Имя товара</label>
    <input type="text" name="title" class="form-control" placeholder="Имя товара" value="{{ $product->title ?? '' }}" required>
</div>

<div class="form-group">
    <label for="alias">Ссылка</label>
    <input type="text" name="alias" class="form-control" placeholder="Автоматическая генерация" value="{{ $product->alias ?? '' }}" readonly>
</div>

<div class="form-group">
    <label for="category_id">Родительская категория</label>
    <select name="category_id" class="form-control">
        @include('admin.product._category', ['categories'=>$categories])
    </select>
</div>

<div class="form-group">
    <label for="price">Цена</label>
    <input type="number" name="price" class="form-control" placeholder="Цена" pattern="^[0-9.]{1,}$" value="{{ $product->price ?? '' }}" required>
</div>

<div class="form-group">
    <label for="amount">Количество</label>
    <input type="number" name="amount" class="form-control" placeholder="Запась в скалде" pattern="^[0-9.]{1,}$" value="{{ $product->amount ?? '' }}" required>
</div>

<div class="form-group">
    <label for="alif">Alif</label>
    <input type="text" name="alif_link" class="form-control" id="alif" placeholder="сылка на alif.shop" value="{{ $product->alif_link ?? '' }}">
</div>

<div class="form-group">
    <label for="description">Описание товара</label>
    <textarea class="form-control" name="description" id="description" rows="5">{{ $product->description ?? '' }}</textarea>
</div>

<div class="form-group">
    <label>
        <input type="checkbox" name="visible"
               @if(isset($product->visible) and $product->visible)
               checked
               @endif
        > Статус
    </label>
</div>

<div class="form-group">
    <label>
        <input type="checkbox" name="recommended"
               @if(isset($product->recommended) and $product->recommended)
               checked
               @endif
        > Рекомендуеться
    </label>
</div>

<div class="form-group">
    <div class="col-md-5">
        <div class="card shadow mb-4 border-danger">
            <div class="card-header badge-danger">
                <h4 class="card-title">Базовое изображение</h4>
            </div>
            <div class="card-body">
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
        </div>
    </div>
</div>
<input type="submit" class="btn btn-success btn-block" value="Сохранить"><?php
