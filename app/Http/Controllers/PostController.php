<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(1);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePostRequest $request)
    {
        Post::create($request->all());
        return redirect()
            ->route('posts.index')
            ->with('message', 'Post criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$post = Post::find($id))
            return redirect()->route('posts.index');

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$post = Post::find($id))
            return redirect()->back();

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePostRequest $request, $id)
    {
        if (!$post = Post::find($id)) {
            return redirect()->back();
        }

        $post->update($request->all());

        return redirect()
            ->route('posts.index')
            ->with('message', 'Post atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$post = Post::find($id))
            return redirect()->back();

        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('message', 'Post deletada com sucesso');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_toker');
        $posts = Post::where('title', '=', $request->search)
            ->orWhere('content', 'LIKE', "%{$request->search}%")
            ->paginate(1);
        return view("admin.posts.index", compact('posts', 'filters'));
    }
}
