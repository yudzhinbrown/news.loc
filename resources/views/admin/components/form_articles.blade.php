<div class="form-group">
    <label for="title">Наименование новости</label>
    <input value="{{$article->title ?? ""}}" name="title" type="text" class="form-control" id="title"
           required>
</div>
<div class="form-group">
    <label for="published">Статус</label>
    <select name="published" class="form-control" id="published">
        @if (isset($article->id))
            <option value="1" @if ($article->published == 1) selected @endif>Опубликована</option>
            <option value="0" @if ($article->published == 0) selected @endif>Не опубликована</option>
        @else
            <option value="1">Опубликована</option>
            <option value="0">Не опубликована</option>
        @endif
    </select>
</div>
<div class="form-group">
    <label for="categories">Категории</label>
    <select name="categories[]" multiple="" class="form-control" id="categories">
        @foreach($categories as $category)
            <option value="{{$category->id}}"

            @isset ($article->id)
                @foreach ($article->categories as $category_article)
                    @if ($category->id == $category_article->id)
                        selected
                    @endif
                    @endforeach
                    @endisset
            >
                {{$category->title}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="image">Изображение к новости </label>
    <input name="image" type="file" class="form-control-file">
</div>
<div class="form-group">
    <label for="meta_description">Мета описание</label>
    <input name="meta_description" value="{{$article->meta_description ?? ""}}" type="text" class="form-control" id="meta_description">
</div>
<div class="form-group">
    <label for="meta_keyword">Ключевые слова</label>
    <input name="meta_keyword" value="{{$article->meta_description ?? ""}}" type="text" class="form-control" id="meta_keyword">
</div>
<div class="form-group">
    <label for="text">Текст новости</label>
    <textarea  id="input-text-news" class="form-control" name="text" >{{$article->text ?? ""}}</textarea>
</div>
<div class="form-group">
    <label for="slug">Slug</label>
    <input name="slug" value="{{$article->slug ?? ""}}" type="text" class="form-control" readonly="" id="slug"
           placeholder="Генерируется автоматически">
</div>
