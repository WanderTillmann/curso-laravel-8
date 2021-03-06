@extends('admin.layouts.app')

@section('title', 'Edicao de posts')
@section('content')
<h1>Editar o Post <strong>{{ $post->title }}</strong></h1>

<form action="{{ route('posts.update', $post->id) }}" method="post">
    @method('PUT')
   @include('admin.posts.form')
</form> 
@endsection

