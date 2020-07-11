<div class="form-group">
    <label for="title">Наименование категории</label>
    <input type="text" name="title" class="form-control" placeholder="Название категории" value="{{ $category->title ?? '' }}" required>
</div>
<div class="form-group">
    <label for="alias">Ссылка</label>
    <input type="text" name="alias" class="form-control" placeholder="Автоматическая генерация" value="{{ $category->alias ?? '' }}" readonly>
</div>
<div class="form-group">
    <label for="parent_id">Родительская категория</label>
    <select name="parent_id" class="form-control">
        <option value="0">--- Без родительской категории ---</option>
        @include('admin.category._category', ['categories'=>$categories])
    </select>
</div>
<input type="submit" class="btn btn-success btn-block" value="Сохранить">
