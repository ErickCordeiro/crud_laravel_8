<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('message'))
                        <div class="w-full bg-yellow-500 p-3 mb-2">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex w-5/6">
                            <form action="{{ route('posts.search') }}" method="post">
                                @csrf
                                <input type="text" placeholder="Pesquisar..." name="search" class="w-80">
                                <button type="submit"
                                    class="bg-blue-200 p-2 hover:bg-blue-400 rounded-sm">Pesquisar</button>
                                <a href="{{ route('posts.index') }}"
                                    class="rounded-sm bg-red-200 p-2 hover:bg-red-400 mx-2">Limpar</a>
                            </form>
                        </div>

                        <div class="w-1/6">
                            <a href="{{ route('posts.create') }}"
                                class="p-2 bg-green-400 rounded-sm hover:bg-green-500">Adicionar Novo</a>
                        </div>
                    </div>

                    @foreach ($posts as $post)
                        <div class="flex justify-between items-center mb-3">
                            <img class="w-1/6" src="{{ url("storage/{$post->cover}") }}" alt="{{ $post->title }}"
                                style="max-width: 100px">

                            <div class="w-4/6">
                                <h4 class="font-bold text-gray-600 text-base">{{ $post->title }}</h4>
                                <p class="text-gray-500 text-sm">{{ $post->content }}</p>
                            </div>
                            <span class="inline-block w-1/6">
                                <a class="bg-blue-400 bg-opacity-2 p-2"
                                    href="{{ route('posts.show', $post->id) }}">Details</a>
                                <a class="bg-red-400 bg-opacity-2 p-2"
                                    href="{{ route('posts.edit', $post->id) }}">Editar</a>
                            </span>
                        </div>
                    @endforeach

                    <hr>
                    @if (isset($filters))
                        {{ $posts->appends($filters)->links() }}
                    @else
                        {{ $posts->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
