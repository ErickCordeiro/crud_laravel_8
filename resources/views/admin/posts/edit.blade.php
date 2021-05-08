<h2>Editar Post {{$post->title}}</h2>

<form action="{{route('posts.update', $post->id)}}" method="post">
    @method('PUT')
    @include('admin.posts._partials.form')
</form>