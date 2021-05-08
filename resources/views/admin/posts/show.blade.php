<h2>Detalhes Post {{$post->title}}</h2>
<ul>
<li>{{$post->title}}</li>
<li>{{$post->content}}</li>
</ul>

<form action="{{route('posts.destroy', $post->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Deletar Post {{$post->title}}</button>
</form>