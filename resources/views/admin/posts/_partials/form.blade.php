@if($errors->any())
<div>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</div>
@endif

@csrf
<input type="text" name="title" placeholder="Titulo" id="title" value="{{$post->title ?? old('title')}}">
<input type="file" name="cover">
<textarea name="content" id="content" cols="30" rows="4" placeholder="Conteúdo">{{$post->content ?? old('content')}}</textarea>
<button type="submit">Salvar Infos</button>