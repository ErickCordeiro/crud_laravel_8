<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StoreUpdatePost $request)
    {
        $data = $request->all();

        if ($request->cover->isValid()) {
            $cover = $request->cover->store('posts');
            $data['cover'] = $cover;
        }

        Post::create($data);
        return redirect()
            ->route('posts.index')
            ->with('message', 'Post CRIADO com sucesso!');;
    }

    public function show($id)
    {
        if (!$post = Post::find($id)) {
            return redirect()->route('posts.index');
        }

        return view('admin.posts.show', compact('post'));
    }

    public function edit($id)
    {
        if (!$post = Post::find($id)) {
            return redirect()->route('posts.index');
        }

        return view('admin.posts.edit', compact('post'));
    }

    public function update(StoreUpdatePost $request, $id)
    {
        if (!$post = Post::find($id)) {
            return redirect()->route('posts.index');
        }

        $data = $request->all();

        if ($request->cover && $request->cover->isValid()) {

            if (Storage::exists($post->cover)) {
                Storage::delete($post->cover);
            }

            $cover = $request->cover->store('posts');
            $data['cover'] = $cover;
        }

        $post->update($data);

        return redirect()
            ->route('posts.index')
            ->with('message', 'Post Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        if (!$post = Post::find($id))
            return redirect()->route('posts.index');

        if (Storage::exists($post->cover)) {
            Storage::delete($post->cover);
        }

        $post->delete();
        return redirect()
            ->route('posts.index')
            ->with('message', 'Post Deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $posts = Post::where('title', '=', $request->search)
            ->orWhere('content', 'LIKE', '%{$request->search}%')
            ->paginate(1);

        return view('admin.posts.index', compact('posts', 'filters'));
    }
}
