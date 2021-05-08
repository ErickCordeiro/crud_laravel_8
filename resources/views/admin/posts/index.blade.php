<a href="{{ route('posts.create') }}">Adicionar Novo</a>
<hr>
@if(session('message'))
<div>
    {{session('message')}}
</div>
@endif

<h1>Posts</h1>
<form action="{{route('posts.search')}}" method="post">
    @csrf
    <input type="text" placeholder="Pesquisar..." name="search">
    <button type="submit">Pesquisar</button>
</form>

<a href="{{route('posts.index')}}">Limpar Pesquisa</a>

@foreach( $posts as $post)
<h4>{{$post->title}}
    [<a href="{{route('posts.show', $post->id)}}">Details</a>]
    [<a href="{{route('posts.edit', $post->id)}}">Editar</a>]</h4>
@endforeach

<hr>
@if (isset($filters))
{{$posts->appends($filters)->links()}}
@else
{{$posts->links()}}
@endif