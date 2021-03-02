<a href="{{ route('posts.create') }}">Criar novo post</a>
<hr>
@if (session('message'))
    <div>
        {{ session('message') }}
    </div>
@endif
<h1>Posts</h1>
@foreach ($posts as $post)
    <p>{{ $post->title }}</p>[<a href={{ route('posts.show', $post->id) }}>Ver detalhes</a>]-[<a
        href={{ route('posts.update', $post->id) }}>Editar</a>]
@endforeach
