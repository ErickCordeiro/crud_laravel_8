<a href="{{ route('posts.create') }}">Adicionar Novo</a>
<hr>
@if(session('message'))
<div>
    {{session('message')}}
</div>
@endif

<h1>Posts</h1>
@foreach( $posts as $post)
<h4>{{$post->title}}
    [<a href="{{route('posts.show', $post->id)}}">Details</a>]
    [<a href="{{route('posts.edit', $post->id)}}">Editar</a>]</h4>
@endforeach