<div class="form-group">
    <label for="title">Наименование категории</label>
    <input value="{{$category->title ?? ""}}" name="title" type="text" class="form-control" id="title"
           required>
</div>
<div class="form-group">
    <label for="published">Статус</label>
    <select name="published" class="form-control" id="published">
        @if (isset($category->id))
            <option value="1" @if ($category->published == 1) selected @endif>Опубликована</option>
            <option value="0" @if ($category->published == 0) selected @endif>Не опубликована</option>
        @else
            <option value="1">Опубликована</option>
            <option value="0">Не опубликована</option>
        @endif
    </select>
</div>
<div class="form-group">
    <label for="slug">Slug</label>
    <input name="slug" value="{{$category->slug ?? ""}}" type="text" class="form-control" readonly="" id="slug"
           placeholder="Генерируется автоматически">
</div>
