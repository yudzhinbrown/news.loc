@extends('admin.layouts.app')

@section('content')
    <form action="{{route('admin.category.update', $category)}}" method="post">
        @csrf
        @method('PUT')
        @include('admin.components.form')
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection