@extends('admin.layouts.app')

@section('title', 'Criacao de posts')
@section('content')
    <h1 class="text-center text-3x1 uppercase font-black my-4">Cadastrar o novo Post</h1>

    <div class="w-11/12 p-12 bg-whit sm:w-8/12 mdw-1/2 lg:w-5/12 mx-auto">
        <form action="{{ route('posts.store') }}" method="post" m enctype="multipart/form-data">
            @include('admin.posts.form')
        </form>
    </div>

@endsection
