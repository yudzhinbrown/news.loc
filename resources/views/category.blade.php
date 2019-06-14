@extends('layouts.app')

@section('title', $category->title)
@section('content')

    <div class="container">
        <div class="row">
            <form class="col-md-12" action="{{url("category/$category->slug")}}" method="get">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputSort">Сортировать по:</label>
                        <select name="sort" class="form-control">
                            <option value="date">По Дате</option>
                            <option value="viewed">По Рейтенгу</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputOrder">Порядок сортировки</label>
                        <select name="order" class="form-control">
                            <option value="asc">По Возростанию</option>
                            <option value="desc">По Убыванию</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputOrder">&nbsp;</label>
                        <button type="submit" class="form-control btn btn-primary">Отсортировать</button>
                    </div>
                </div>
            </form>
            @forelse($articles as $article)
                <div class="col-md-12">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0">{{$article->title}} </h3>
                            <div class="mb-1 text-muted">{{$article->created_at}} ||
                                Просмотров: {{$article->viewed}} </div>
                            <p class="card-text mb-auto">{!!  $article->getShortTextAttribute()!!}</p>
                            <a href="{{route('article', $article->slug)}}" class="stretched-link">Читать далее</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            @if(!empty($article->img))
                            <img src="{{asset('/storage/image/' . $article->img)}}" width="200" height="200">
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <h1>В данной категории нету новостей</h1>
            @endforelse
            <ul class="pagination">
                {{$articles->links()}}
            </ul>
        </div>
    </div>
@endsection
