@extends('admin.layouts.app')

@section('content')
    <form action="{{route('admin.article.update', $article)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.components.form_articles')
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection