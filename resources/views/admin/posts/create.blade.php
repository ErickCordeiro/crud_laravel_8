@extends('admin.layouts.app')

@section('title', 'Novo Post')

@section('content')
    <h2>Cadastro novo post</h2>
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @include('admin.posts._partials.form')
    </form>
@endsection
