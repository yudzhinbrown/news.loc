@extends('admin.layouts.app');

@section('content')
    <a class="btn btn-success float-right" href="{{route('admin.article.create')}}">Добавить новость</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Наименование</th>
            <th scope="col">Статус</th>
            <th colspan="2" class="text-center">Действие</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($articles as $article)
            <tr>
                <td>{{$article->title}}</td>
                <td>
                    @if($article->published)
                        Опубликована
                    @else
                        Не опубликована
                    @endif
                </td>
                <td><a href="{{route('admin.article.edit', $article)}}" class="btn btn-secondary">Изменить</a></td>
                <td>
                    <form action="{{route('admin.article.destroy', $article)}}" method="post">
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
        <tr>
            <td>
                <ul class="pagination">
                    {{$articles->links()}}
                </ul>
            </td>
        </tr>
        </tfoot>
    </table>

@endsection
