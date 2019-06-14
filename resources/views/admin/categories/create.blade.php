@extends('admin.layouts.app')

@section('content')

    <form action="{{route('admin.category.store')}}" method="post">
        @csrf
        @include('admin.components.form')
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection