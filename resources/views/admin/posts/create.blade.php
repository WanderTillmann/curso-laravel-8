@extends('admin.layouts.app')

@section('title', 'Criacao de posts')
@section('content')
<a>Cadastrar o novo Post</h1>


<form action="{{ route('posts.store') }}" method="post"m enctype="multipart/form-data">
   @include('admin.posts.form') 
</form>
@endsection

