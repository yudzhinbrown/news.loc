@extends('admin.layouts.app')

@section('content')
    <form action="{{route('admin.article.store')}}" method="post">
        @csrf
        @include('admin.components.form_articles')
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection