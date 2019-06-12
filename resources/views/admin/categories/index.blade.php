@extends('admin.layouts.app');

@section('content')
    <a class="btn btn-success float-right" href="{{route('admin.category.create')}}">Добавить категорию</a>
    <table class="table table-borderless">
        <thead>
        <tr>
            <th scope="col">Наименование</th>
            <th scope="col">Статус</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($categories as $category)
            <tr>
                <td>{{$category->title}}</td>
                <td>{{$category->published}}</td>
                <td><a href="{{route('admin.category.edit', ['category_id' => $category->id])}}">Изменить</a></td>
                <td><a href="">Удалить</a></td>
            </tr>
        @empty
            <tr>
                <td>Данных нет</td>
            </tr>

        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <td>
                <ul class="pagination">
                    {{$categories->links()}}
                </ul>
            </td>
        </tr>
        </tfoot>
    </table>

@endsection