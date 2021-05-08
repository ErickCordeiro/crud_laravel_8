@extends('admin.layouts.app')

@section('title', 'Visualizar')

@section('content')

    <h2>Detalhes Post {{ $post->title }}</h2>
    <ul>
        <li>{{ $post->title }}</li>
        <li>{{ $post->content }}</li>
    </ul>

    <img src="{{ url("storage/{$post->cover}") }}" alt="{{ $post->title }}" style="max-width: 100px">

    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Deletar Post {{ $post->title }}</button>
    </form>

@endsection
