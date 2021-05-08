@extends('admin.layouts.app')

@section('title', 'Editar')

@section('content')
    <h2>Editar Post {{ $post->title }}</h2>

    <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.posts._partials.form')
    </form>

    <img src="{{ url("storage/{$post->cover}") }}" alt="{{ $post->title }}" style="max-width: 100px">
@endsection
