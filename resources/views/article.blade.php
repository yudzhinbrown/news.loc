@extends('layouts.app')

@section('title', $article->title)
@section('content')
    <div class="container">
        <div class="blog-post">
            <h2 class="blog-post-title">{{$article->title}}</h2>

            <p class="blog-post-meta">{{$article->created_at}} || Просмотров: {{$article->viewed}}</p>
            @if(!empty($article->img))
                <div class="text-center">
                    <img class="center" src="{{asset('/storage/image/' . $article->img)}}">
                </div>

            @endif
            {!! $article->text !!}
        </div>
    </div>
@endsection
