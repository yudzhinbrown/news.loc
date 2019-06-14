<nav class="nav">
    <a class="nav-link " href="{{url("category/all")}}">Всё</a>
    @forelse($categories as $category)
        <a class="nav-link" href="{{url("category/$category->slug")}}">{{$category->title}}</a>
    @empty
    @endforelse

</nav>