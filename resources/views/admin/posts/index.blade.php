@extends('admin.layouts.app')

@section('title', 'Listagem de posts')

@section('content')
    <h1 class=" text-center text-3x1 uppercase font-black my-8">listagem dos posts</h1>
    <div class="flex  flex-col box-border">
        <div>
            <a class="text-center text-3x1 uppercase font-black my-4 float-left" href="{{ route('posts.create') }}">
                <button class="py-2 px-4 bg-green-500 text-white rounded-lg">Criar novo
                    post</button>
            </a>
        </div>

        <hr>
        @if (session('message'))
            <div>
                {{ session('message') }}
            </div>
        @endif
        <div>
            <form action="{{ route('posts.search') }}" method="post">
                @csrf
                <input class="rounded-lg py-2 px-4 my-4" type="text" name="search" id="" placeholder="filtrar:">
                <button class="py-2 px-4 bg-blue-500 text-white rounded-lg" type="submit">Filtrar</button>
            </form>
        </div>
        <div>
            <table class="table-fixed bg-white ">
                <thead class="px-2">
                    <tr>
                        <th class="w-1/4 text-left">ID</th>
                        <th class="w-1/4  text-left">Image</th>
                        <th class="w-1/4 ">Nome</th>
                        <th class="w-1/4 "></th>
                    </tr>
                </thead>
                <tbody class="px-2">
                    @foreach ($posts as $post)
                        <tr class="object-center">
                            <th class="text-left">{{ $post->id }}</th>
                            <th class="text-left"> <img src="{{ url("storage/{$post->image}") }}" alt=""
                                    class="obect-fill h-20  object-center"> </th>
                            <th class="object-center w-screen">{{ $post->title }}</th>
                            <th class="text-right">
                                <a href="{{ route('posts.show', $post->id) }}">
                                    <button class="py-2 px-4 bg-white rounded border-black">Ver detalhes</button>
                                </a>
                                <a href="{{ route('posts.edit', $post->id) }}">
                                    <button class="py-2 px-4 bg-white rounded border-black"> Editar</button>
                                </a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <hr>

        @if (isset($filters))
            {{ $posts->appends($filters)->links() }}
        @else
            {{ $posts->links() }}
        @endif

    </div>


@endsection
