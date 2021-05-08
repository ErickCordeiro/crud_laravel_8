<h2>Cadastro novo post</h2>
@if($errors->any())
<div>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</div>
@endif
<form action="{{route('posts.store')}}" method="post">
    @csrf
    <input type="text" name="title" placeholder="Titulo" id="title" value="{{old('title')}}">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="Conteúdo">{{old('content')}}</textarea>
    <button type="submit">Cadastrar</button>
</form>