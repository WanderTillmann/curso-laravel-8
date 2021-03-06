@extends('admin.posts.app')

@section('title', 'Detalhes do Post')

@section('content')
<h1>Detalhes do Post {{ $post->title }}</h1>

<ul>
    <li><strong> Titulo:</strong> {{ $post->title }}</li>
    <li><strong> Conteudo: </strong> {{ $post->content }}</li>
</ul>
<form action={{ route('posts.destroy', $post->id) }} method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Deletar o post</button>
</form>  
@endsection

