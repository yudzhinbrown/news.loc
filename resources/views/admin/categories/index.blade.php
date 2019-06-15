@extends('admin.layouts.app');

@section('content')
    <a class="btn btn-success float-right" href="{{route('admin.category.create')}}">Добавить категорию</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Наименование</th>
            <th scope="col">Статус</th>
            <th colspan="2"" class="text-center">Действие</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($categories as $category)
            <tr>
                <td>{{$category->title}}</td>
                <td>
                    @if($category->published)
                        Опубликована
                    @else
                        Не опубликована
                    @endif
                </td>
                <td><a href="{{route('admin.category.edit', $category)}}" class="btn btn-secondary">Изменить</a></td>
                <td>
                    <form action="{{route('admin.category.destroy', $category)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td>Данных нет</td>
            </tr>

        @endforelse
        </tbody>
        <tfoot>
        </tfoot>
    </table>
     <ul class="pagination">
                    {{$categories->links()}}
                </ul>

@endsection
