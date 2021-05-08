<h2>Editar Post {{$post->title}}</h2>
@if($errors->any())
<div>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</div>
@endif
<form action="{{route('posts.update', $post->id)}}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="title" placeholder="Titulo" id="title" value="{{$post->title}}">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="Conteúdo">{{$post->content}}</textarea>
    <button type="submit">Atualizar</button>
</form>