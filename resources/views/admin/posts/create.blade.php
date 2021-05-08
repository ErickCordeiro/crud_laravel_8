<h2>Cadastro novo post</h2>
<form action="{{route('posts.store')}}" method="post">
    @include('admin.posts._partials.form')
</form>